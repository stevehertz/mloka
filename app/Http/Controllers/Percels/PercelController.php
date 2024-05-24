<?php

namespace App\Http\Controllers\Percels;

use App\Models\Shop;
use App\Models\Percel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Percels\SendPercelRequest;
use App\Repositories\PercelRepository;
use App\Http\Requests\StorePercelRequest;
use App\Http\Requests\UpdatePercelRequest;
use App\Repositories\CustomersRepository;
use App\Repositories\ProductsRepository;

class PercelController extends Controller
{
    private $percelRepository, $customersRepository, $productsRepository;

    public function __construct(PercelRepository $percelRepository, CustomersRepository $customersRepository, ProductsRepository $productsRepository)
    {
        $this->percelRepository = $percelRepository;   
        $this->customersRepository = $customersRepository;
        $this->productsRepository = $productsRepository;
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Shop $shop)
    {
        //
        $data = $this->percelRepository->getShopSendPercel($shop);
        $customers = $this->customersRepository->fetchAllCustomersForShop($shop);
        $products = $this->productsRepository->fetchProductsForShop($shop);
        return view('percel.index', [
            'data' => $data,
            'customers' => $customers,
            'products' => $products,
            'shop' => $shop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sendPercel(Shop $shop)
    {
        //
        $customers = $this->customersRepository->fetchAllCustomersForShop($shop);
        $products = $this->productsRepository->fetchProductsForShop($shop);
        return view('percel.sendPercel', [
            'shop' => $shop,
            'customers' => $customers,
            'products' => $products
        ]);
    }

    /**
     * Send a newly created resource in storage.
     */
    public function send(SendPercelRequest $request, Shop $shop)  
    {
        $data = $request->except("_token");
        $percel = $this->percelRepository->sendPercel($data, $shop);
        if($percel)
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.percels.sent')
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePercelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Percel $percel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Percel $percel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePercelRequest $request, Percel $percel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Percel $percel)
    {
        //
    }
}
