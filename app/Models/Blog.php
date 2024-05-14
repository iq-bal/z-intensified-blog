<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['title','tags','description','author','logo','email','user_id'];
    public function scopeFilter($query, array $filters){
        
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag'). '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search'). '%')
            ->orWhere('description', 'like', '%' . request('search'). '%')
            ->orWhere('tags', 'like', '%' . request('search'). '%')
            ->orWhere('author', 'like', '%' . request('search'). '%')
            ;
        }
    }
    // Relationship with user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        // one blog belong to only one user
    }

    // relationship with comment
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // relationship with likes
    public function likes(){
        return $this->hasMany(Like::class); 
    }

    // one post has one announcement
    public function announcement(){
        return $this->hasOne(Announcement::class); 
    }
}
