<?php

namespace App\Repositories;

use Countries;
use App\Models\Shop;
use App\Models\User;
use App\Models\KenyaCounty;
use App\Enums\DefaultStatus;

class ShopRepository
{

    public function getUserShops(User $user)
    {
        return $user->shop()->latest()->get();
    }


    public function getDefaultUserShop(User $user)
    {
        $shop = $user->shop()->where('default', DefaultStatus::DEFAULT_SHOP)->first();
        if ($shop) {
            return $shop;
        }
        return false;
    }

    public function registerShop(array $attributes)
    {
        $shop = Shop::create([
            'user_id' => data_get($attributes, 'user_id'),
            'name' => data_get($attributes, 'name'),
            'logo' => 'noimage.png',
            'address' => data_get($attributes, 'address'),
            'county' => data_get($attributes, 'county'),
            'location' => data_get($attributes, 'location'),
            'phone' => data_get($attributes, 'phone'),
            'email' => data_get($attributes, 'email'),
            'default' => DefaultStatus::DEFAULT_SHOP,
            'created_by' => data_get($attributes, 'user_id'),
            'updated_by' => data_get($attributes, 'user_id'),
        ]);
        return $shop;
    }

    public function storeShop(array $attributes)
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
            'default' => DefaultStatus::OTHER_SHOP,
            'created_by' => data_get($attributes, 'user_id'),
            'updated_by' => data_get($attributes, 'user_id'),
        ]);
        return $shop;
    }

    public function show($id)
    {
        $shop = Shop::with(['customer', 'product', 'percel'])->findOrFail($id);
        return $shop;
    }

    public function countryLists()
    {
        $countries = Countries::getList('en', 'json');
        return $countries;
    }

    public function counties() 
    {
        $counties = KenyaCounty::all();
        return $counties;
    }
}
