<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
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

    public function reward(Request $request)
    {
        $customer = auth('api')->user();

        $project_id = $request->get('project_id');

        if ($project_id == env('PROJECT_ID')) {

            $rewards = rand(1, 5) / 10;
            $last_deposit_id = $customer->deposits()->orderBy('id', 'desc')->first()->id;

            $data = [
                'rewards' => $rewards,
                'purchase_id' => 'reward#' . $last_deposit_id + 1,
                'purchase_token' => 'reward#' . $last_deposit_id + 1,
            ];

            $transaction_controller = new TransactionController();
            $response = $transaction_controller->deposit(new Request($data));

            if ($response->getData()->success) {
                return response()->json([
                    'success' => true,
                    'message' => 'You have been rewarded with ' . $rewards . ' rewards',
                    'balance' => $customer->balance(),
                ], 200);
            }

        }

        return response()->json([
            'success' => false,
            'message' => 'You are not eligible for this reward',
        ], 200);

    }
}
