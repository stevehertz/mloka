<?php 

namespace App\Repositories;

use App\Models\Product;
use App\Models\Shop;

class ProductsRepository
{
    public function fetchProductsForShop(Shop $shop)  
    {
        return $shop->product()->latest()->get();
    }

    public function storeProduct(array $attributes, Shop $shop)  
    {
        $product = Product::create([
            'shop_id' => $shop->id,
            'name' => data_get($attributes, 'name'),
            'description' => data_get($attributes, 'description'),
            'weight' => data_get($attributes, 'weight'),
            'weigh_unit' => data_get($attributes, 'weigh_unit'),
            'length' => data_get($attributes, 'length'),
            'width' => data_get($attributes, 'width'),
            'height' => data_get($attributes, 'height'),
            'size_unit' => data_get($attributes, 'size_unit'),
            'created_by'  => data_get($attributes, 'user_id'),
            'updated_by'  => data_get($attributes, 'user_id')
        ]);

        return $product;
    }

    public function showProduct($id)  
    {
        $product = Product::with('shop')->findOrFail($id);
        return $product;   
    }

    public function updateProduct(array $attributes, Product $product)  
    {
        $product->update([
            'name' => data_get($attributes, 'name'),
            'description' => data_get($attributes, 'description'),
            'weight' => data_get($attributes, 'weight'),
            'weigh_unit' => data_get($attributes, 'weigh_unit'),
            'length' => data_get($attributes, 'length'),
            'width' => data_get($attributes, 'width'),
            'height' => data_get($attributes, 'height'),
            'size_unit' => data_get($attributes, 'size_unit'),
            'updated_by'  => data_get($attributes, 'user_id')
        ]);
        
        return $product;
    }

    public function destroyProduct(Product $product)  
    {
        if($product->delete())
        {
            return true;
        }   
        return false;
    }

    public function getAllTrashed()  
    {
        
    }

    public function restoreProduct($id)  
    {
        
    }

    public function forceDestroy($id)  
    {
        
    }
}