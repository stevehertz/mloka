<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = [
        'user_id',
        'shop_id',
        'location',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = [
        'deleted_by'
    ];

    public function user()  
    {
        return $this->belongsTo(User::class, 'user_id');    
    }

    public function shop()  
    {
        return $this->belongsTo(Shop::class, 'shop_id');    
    }
}
