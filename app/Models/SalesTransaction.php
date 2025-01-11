<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\TransactionDetail;

class SalesTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'total_amount',
        'transaction_date',
        'payment_method',
        'status',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }   
    public function details(){
        return $this->hasMany(TransactionDetail::class, 'sale_id');
    }
}
