<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index(Shop $shop)  
    {
        return view('settings.index', [
            'shop' => $shop
        ]);
    }
}
