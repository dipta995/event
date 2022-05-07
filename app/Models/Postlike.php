<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postlike extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','user_id','like'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
