<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $customer = auth('api')->user();

        $deposits = $customer->deposits()->orderBy('created_at', 'desc')->get();
        $withdrawals = $customer->withdrawals()->orderBy('created_at', 'desc')->get();
        $total_withdrawal = $customer->withdrawals()->where('status', 4)->sum('cookies');

        return response()->json([
            'success' => true,
            'message' => 'Transactions fetched successfully',
            'deposits' => $deposits,
            'withdrawals' => $withdrawals,
            'total_withdrawal' => $total_withdrawal,
            'balance' => $customer->balance(),
        ], 200);
    }
    public function deposit(Request $request)
    {
        $customer = auth('api')->user();
        $cookies = $request->get('cookies');
        $purchase_id = $request->get('purchase_id');
        $purchase_token = $request->get('purchase_token');

        $deposit = $customer->deposits()->where('purchase_token', $purchase_token)->first();

        if ($deposit) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid purchase',
            ], 400);
        }

        $deposit = new Deposit();
        $deposit->customer_id = $customer->id;
        $deposit->purchase_id = $purchase_id;
        $deposit->purchase_token = $purchase_token;
        $deposit->cookies = $cookies;
        $deposit->status = 4;

        $deposit->save();

        return response()->json([
            'success' => true,
            'message' => 'Deposit completed successfully',
            'deposit' => $deposit,
            'balance' => $customer->balance(),
        ], 200);
    }

    public function withdraw(Request $request)
    {
        $customer = auth('api')->user();
        $cookies = $request->get('cookies');
        $payout_method = $request->get('payout_method');
        $payout_id = $request->get('payout_id');
        $beneficiary_name = $request->get('beneficiary_name');

        $balance = $customer->balance();

        if ($cookies > $balance) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance',
            ], 200);
        }

        $withdrawal = new Withdrawal();
        $withdrawal->customer_id = $customer->id;
        $withdrawal->cookies = $cookies;
        $withdrawal->payout_method = $payout_method;
        $withdrawal->payout_id = $payout_id;
        $withdrawal->beneficiary_name = $beneficiary_name;
        $withdrawal->status = 1;

        $withdrawal->save();

        return response()->json([
            'success' => true,
            'message' => 'Withdrawal initiated successfully, please wait for confirmation',
            'withdrawal' => $withdrawal,
        ], 200);
    }
}
