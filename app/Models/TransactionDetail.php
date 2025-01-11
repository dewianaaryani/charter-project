<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalesTransaction;
use App\Models\Inventory;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'inventory_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];
    public function sale()
    {
        return $this->belongsTo(SalesTransaction::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
