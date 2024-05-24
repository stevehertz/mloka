<?php

namespace App\Http\Controllers\Settings;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ShopRepository;
use App\Http\Requests\Shops\UpdateShopRequest;

class SettingsController extends Controller
{
    //
    private $shopRepository;
    public function __construct(ShopRepository $shopRepository)
    {
        $this->middleware('auth');   
        $this->shopRepository = $shopRepository;
    }

    public function index(Shop $shop)  
    {
        $counties = $this->shopRepository->counties();
        return view('settings.index', [
            'shop' => $shop,
            'counties' => $counties
        ]);
    }

    public function update(UpdateShopRequest $request, Shop $shop)  
    {
        $data = $request->except("_token");
        if ($request->file('logo')) {
            $path = $request->file('logo')->store('shops', 'public');
        }else{
            $path = $shop->logo;
        }
        $shop = $this->shopRepository->updateShop($data, $path, $shop);
        if ($shop) {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.updated', ['title' => 'shop'])
            ]);
        }
    }
}
