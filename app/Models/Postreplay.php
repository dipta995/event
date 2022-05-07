<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postreplay extends Model
{
    use HasFactory;
    protected $fillable = ['comment_id','user_id','replay'];

    public function postcomment()
    {
        return $this->belongsTo(Postcomment::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
