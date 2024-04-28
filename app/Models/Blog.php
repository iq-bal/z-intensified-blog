<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['title','tags','description','author','logo','email'];
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
}
