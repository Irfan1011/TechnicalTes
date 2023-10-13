<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Product extends Model
{
    use HasFactory, HasUuid, SoftDeletes;
    
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'photo',
        'product_name',
        'price',
        'user_id',
    ];
}
