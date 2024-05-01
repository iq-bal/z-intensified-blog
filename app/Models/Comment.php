<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment','user_id','blog_id'];
    
    public function blogs(){
        return $this->belongsTo(Blog::class);
    }
    // Relationship with user
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
