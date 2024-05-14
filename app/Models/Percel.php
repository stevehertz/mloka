<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Percel extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'shop_id',
        'customer_id',
        'product_id',
        'location',
        'deposit_locker',
        'receiving_locker',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function shop()  
    {
        return $this->belongsTo(Shop::class);    
    }

    public function customer()  
    {
        return $this->belongsTo(Customer::class);    
    }

    public function product()  
    {
        return $this->belongsTo(Product::class);    
    }
}
