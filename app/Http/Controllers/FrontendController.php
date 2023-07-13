<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function settings(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $setting->value = $value;
            } else {
                $setting = Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
            $setting->save();
        }

        return back()->with('success', 'Settings updated successfully!');
    }
}
