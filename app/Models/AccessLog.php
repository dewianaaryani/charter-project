<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'check_in_time',
        'check_out_time',
        'duration',
        'status'
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
