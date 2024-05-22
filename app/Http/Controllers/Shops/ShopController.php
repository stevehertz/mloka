<?php

namespace App\Http\Controllers\Shops;

use App\Models\Shop;
use App\Http\Controllers\Controller;
use App\Repositories\ShopRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateShopRequest;
use App\Http\Requests\Shops\StoreShopRequest;
use Monarobase\CountryList\CountryListFacade as CountryList;

class ShopController extends Controller
{

    private $shopRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
        $this->middleware('auth');    
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Shop $shop)
    {
        //
        $user = Auth::user();
        $data = $this->shopRepository->getUserShops($user);
        return view('shops.index', [
            'data' => $data,
            'shop' => $shop
        ]);
    }

    /**
     * Display default listing of the resource.
     */
    public function default()  
    {
        $user = Auth::user();
        $data = $this->shopRepository->getDefaultUserShop($user);
        if($data)
        {
            return redirect()->route('dashboard', $data->id);
        } else 
        {
            return redirect()->route('shops.register');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $countries = Country
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        //
        $data = $request->except("_token");
        if($this->shopRepository->registerShop($data))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.created', ['title' => 'shop'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = $this->shopRepository->show($id);
        return view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
