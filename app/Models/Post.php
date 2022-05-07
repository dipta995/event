<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['channel_id','post_text','slug','tags','status'];

    public function postllike()
    {
        return $this->hasMany(Postlike::class)->where('like','yes');
    }

    public function comment()
    {
        return $this->hasMany(Postcomment::class);
    }
    

    public function postimage()
    {
        return $this->hasOne(Image::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }






}
