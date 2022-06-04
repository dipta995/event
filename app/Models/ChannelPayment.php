<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelPayment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
