<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'verify_otp']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $uuid = $request->input('uuid');
        $email = $request->input('email');
        $name = $request->input('name');
        $image = $request->input('image');

        $customer = Customer::where('uuid', $uuid)->orWhere('email', $email)->first();

        if (!$customer) {
            $customer = new Customer();
        }

        $customer->name = $name;
        $customer->email = $email;
        $customer->uuid = $uuid;
        $customer->image = $image;

        $customer->save();

        $token = $this->guard()->login($customer);

        return $this->respondWithToken($token);

    }

    public function verify_otp(Request $request)
    {
        $phone_number =  $request->input('phone_number');
        $otp =  $request->input('otp');

        $customer = Customer::where('phone_number', $phone_number)->first();

        if($customer) {

            if($customer->otp == $otp) {

                $customer->otp = null;
                $customer->otp_verified_at = now();
                $customer->save();

                $token = $this->guard()->login($customer);

                return $this->respondWithToken($token);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'OTP verification failed',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'OTP verification failed',
            ]);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(
            [
                'success' => true,
                'user' => $this->guard()->user(),
                'usd_to_bdt' => @Setting::where('key', 'usd_to_bdt')->first()->value,
            ]

        );
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $balance = $this->guard()->user()->balance();

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'balance' => $balance,
//            'token_type' => 'bearer',
//            'expires_in' => $this->guard()->factory()->getTTL() * 60,
        ], 200);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
