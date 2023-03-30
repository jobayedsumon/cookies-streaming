<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        $phone_number =  $request->input('phone_number');

        $customer = Customer::where('phone_number', $phone_number)->first();

        $otp = rand(1000, 9999);

        if($customer) {
            $customer->otp = $otp;
            $customer->otp_verified_at = null;
            $customer->save();
        } else {
            Customer::create([
                'uuid' => Str::random(10),
                'phone_number' => $phone_number,
                'otp' => $otp,
                'otp_verified_at' => null,
            ]);
        }

        $text = 'Your '.env('APP_NAME').' OTP Code is ' . $otp;

        if (send_sms($phone_number, $text)) {
            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'OTP sending failed',
            ], 500);
        }
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
            ['success' => true,
                'user' => $this->guard()->user()]

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
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
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
