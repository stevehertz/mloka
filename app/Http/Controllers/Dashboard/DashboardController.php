<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Shop $shop)  
    {
        $customers = $shop->customer()->count();
        $products = $shop->product()->count();
        $sentPercels = $shop->percel()->count();
        return view('dashboard.index', [
            'shop' => $shop,
            'customers' => $customers,
            'products' => $products,
            'sendPercels' => $sentPercels
        ]);    
    }
}
