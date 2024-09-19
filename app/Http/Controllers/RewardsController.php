<?php

namespace App\Http\Controllers;

use App\Models\RewardsPackage;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    public function packages()
    {
        $rewards_packages = RewardsPackage::orderBy('sku_id', 'asc')->pluck('sku_id');

        return response()->json([
            'success' => true,
            'message' => 'Rewards packages retrieved successfully',
            'rewards_packages' => $rewards_packages
        ], 200);
    }
}
