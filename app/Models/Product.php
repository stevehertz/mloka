<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'status',
        'weight',
        'weigh_unit',
        'length',
        'width',
        'height',
        'size_unit',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function shop()  
    {
        return $this->belongsTo(Shop::class);    
    }
}
