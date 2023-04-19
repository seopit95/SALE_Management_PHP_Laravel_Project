<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fiiable = [
        'sort_id',
        'name',
        'price',
        'stock',
        'picture'
    ];
}
