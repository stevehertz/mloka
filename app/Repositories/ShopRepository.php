<?php 

namespace App\Repositories;

use App\Models\Shop;
use App\Models\User;

class ShopRepository {
    
    public function getUserShops(User $user)  
    {
        return Shop::where('user_id', $user->id)->latest()->get();
    }

    public function registerShop(array $attributes)  
    {
        $shop = Shop::create([
            'user_id' => data_get($attributes, 'user_id'),
            'name' => data_get($attributes, 'name'),
            'address' => data_get($attributes, 'address'),
            'city' => data_get($attributes, 'city'),
            'state' => data_get($attributes, 'state'),
            'postal_code' => data_get($attributes, 'postal_code'),
            'country' => data_get($attributes, 'country'),
            'latitude' => data_get($attributes, 'latitude'),
            'longitude' => data_get($attributes, 'longitude'),
            'phone' => data_get($attributes, 'phone'),
            'email' => data_get($attributes, 'email'),
        ]);
        return $shop;
    }
    
}