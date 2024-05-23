<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index(Shop $shop)  
    {
        return view('profile.index', [
            'shop' => $shop
        ]);
    }
}
