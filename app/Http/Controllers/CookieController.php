<?php

namespace App\Http\Controllers;

use App\Models\CookiePackage;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function packages()
    {
        $cookie_packages = CookiePackage::orderBy('sku_id', 'asc')->pluck('sku_id');

        return response()->json([
            'success' => true,
            'message' => 'Cookie packages retrieved successfully',
            'cookie_packages' => $cookie_packages
        ], 200);
    }
}
