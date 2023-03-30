<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
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
