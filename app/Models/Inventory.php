<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'stock',
        'price',
        'min_stock',
        'supplier',
        'last_restocked',
        'status',
    ];
}
