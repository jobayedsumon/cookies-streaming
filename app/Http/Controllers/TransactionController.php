<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{

    public function index()
    {
        $customer = auth('api')->user();

        $transactions = $customer->transactions()->orderBy('created_at', 'desc')->get();

        $total_withdrawal = $transactions->where('type', 2)->where('status', 4)->sum('cookies');

        return response()->json([
            'success' => true,
            'message' => 'Transactions retrieved successfully',
            'transactions' => $transactions,
            'total_withdrawal' => $total_withdrawal,
        ], 200);
    }
    public function create(Request $request)
    {
        $customer = auth('api')->user();

        Transaction::create([
            'customer_id' => $customer->id,
            'cookies' => $request->input('cookies'),
            'type' => $request->input('type'),
            'status' => 1, // processing
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cookies purchased successfully, Currently processing.',
        ], 200);
    }
}
