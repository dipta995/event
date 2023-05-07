<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPayment extends Model
{
    use HasFactory;

    protected $fillable = ['channel_id',
        'payment_type',
        'account_no',
        'ref',
        'amount',
        'from_date',
        'to_date',
        'status'];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
