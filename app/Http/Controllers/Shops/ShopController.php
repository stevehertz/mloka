<?php

namespace App\Http\Controllers\Shops;

use Exception;
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
        $counties = $this->shopRepository->counties();
        $data = $this->shopRepository->getUserShops($user);
        return view('shops.index', [
            'data' => $data,
            'shop' => $shop,
            'counties' => $counties,
        ]);
    }

    public function test_error()  
    {
        throw new Exception("Testing error display");
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
        }
        return redirect()->route('shops.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = $this->shopRepository->countryLists();
        $counties = $this->shopRepository->counties();
        return view('shops.register', [
            'countries' => $countries,
            'counties' => $counties
        ]);
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
            return redirect()->route('shops.default');
        }
    }

     /**
     * Add shop a newly created resource in storage.
     */
    public function addShop(StoreShopRequest $request)  
    {
        $data = $request->except("_token");
        if($this->shopRepository->storeShop($data))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.created', ['title' => 'Shop'])
            ]);
        }
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
        $shop = $this->shopRepository->destroyShop($shop);
        if($shop)
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.deleted', ['title' => 'shop'])
            ]);
        }
    }
}
