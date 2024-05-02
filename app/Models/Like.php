<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    // relationship with Blog
    public function blog(){
        return $this->belongsTo(Blog::class); 
    }

    // relationship with user
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
