<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // add like of dislike
    public function likeOrDislike(Blog $blog){
        $userId = auth()->id();
        $existingLike = Like::where('user_id', $userId)
                            ->where('blog_id', $blog->id)
                            ->first();
    
        if ($existingLike) {
            $existingLike->delete();
        } else {
            Like::create([
                'user_id' => $userId,
                'blog_id' => $blog->id
            ]);
        }
        return back(); 
    }
}
