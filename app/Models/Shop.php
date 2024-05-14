<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'phone',
        'email',
        'status',
        'default',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function customer()  
    {
        return $this->hasMany(Customer::class, 'shop_id');    
    }

    public function product()  
    {
        return $this->hasMany(Product::class);    
    }
}
