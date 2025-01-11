<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipTransaction extends Model
{
    protected $fillable = [
        'member_id',
        'amount',
        'transaction_type',
        'payment_method',
    ];
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
