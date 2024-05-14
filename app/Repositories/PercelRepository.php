<?php 

namespace App\Repositories;

use App\Enums\PercelStatus;
use App\Models\Percel;
use App\Models\Shop;

class PercelRepository
{
    public function getShopSendPercel(Shop $shop, $status = PercelStatus::SENT)  
    {
        $percels = $shop->percel()->where('status', $status)->latest()->get();
        return $percels;
    }

    public function sendPercel(array $attributes, Shop $shop)  
    {
        $percel = Percel::create([
            'shop_id' => $shop->id,
            'customer_id' => data_get($attributes, 'customer_id'),
            'product_id' => data_get($attributes, 'product_id'),
            'location' => data_get($attributes, 'location'),
            'status' => PercelStatus::SENT,
            'created_by' => data_get($attributes, 'user_id'),
            'updated_by' => data_get($attributes, 'user_id'),

        ]);
        
        return $percel;
    }
}