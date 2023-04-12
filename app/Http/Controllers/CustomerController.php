<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function update(Request $request)
    {
        $customer = auth('api')->user();

        $customer->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $customer
        ], 200);
    }
}
