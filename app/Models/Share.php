<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','blog_id','like'];

    //reltionship with blog
    public function blog(){
        return $this->belongsTo(Blog::class); 
    }

    // relationship with user
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
