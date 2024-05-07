<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id','created_by']; 

    public function users(){
        return $this->belongsToMany(User::class,'user_announcement'); 
    }

    // one announcement belong to one post
    public function blog(){
        return $this->belongsTo(Blog::class); 
    }

    // an annoucement is created by only one user
    public function author(){
        return $this->belongsTo(User::class,'created_by'); 
    }
}
