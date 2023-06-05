<?php

namespace App\Models;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','slug','phone','address','image','division','district','status'];

    public function channellike()
    {
        return $this->hasMany(Channellike::class)->where('like','yes');
    }
    public function chanelpost()
    {
        return $this->hasMany(Post::class);
    }
    public function channelorder()
    {
        return $this->hasMany(ChannelPayment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function divisionName()
    {
        return $this->belongsTo(Division::class,'division','id');
    } public function districtName()
    {
        return $this->belongsTo(District::class,'district','id');
    }
    public function channelpayment()
    {
        return $this->hasMany(channelpayment::class);
    }

    // public function channellike()
    // {
    //     return $this->belongsTo(Channellike::class);
    // }
    // public function post()
    // {
    //     return $this->belongsTo(Post::class)->select('channel_id','post_text','slug','tags','status');
    // }



}
