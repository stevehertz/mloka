<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ImportProductsRequest;
use App\Repositories\ProductsRepository;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Models\Shop;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Shop $shop)
    {
        //
        $data = $this->productsRepository->fetchProductsForShop($shop);
        return view('products.index', [
            'data' => $data,
            'shop' => $shop
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, Shop $shop)
    {
        //
        $data = $request->except("_token");
        $product = $this->productsRepository->storeProduct($data, $shop);
        if($product)
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.created', ['title' => 'product'])
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
    public function show($id)
    {
        //
        return response()->json([
            'status' => true,
            'data' => $this->productsRepository->showProduct($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $data = $request->except("_token");
        $product = $this->productsRepository->updateProduct($data, $product);
        if($product)
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.updated', ['title' => 'product'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }

    /**
     * Import resources in storage.
     */
    public function import(ImportProductsRequest $request, Shop $shop)  
    {
        $file = $request->file('file');
        Excel::import(new ProductsImport($shop), $file);
        return response()->json([
            'status' => true,
            'message' => 'Products imported successfully'
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        if($this->productsRepository->destroyProduct($product))
        {
            return response()->json([
                'status' => true,
                'message' => trans('alerts.general.deleted', ['title' => 'product'])
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => [trans('alerts.general.errors')]
        ], 401);
    }
}
