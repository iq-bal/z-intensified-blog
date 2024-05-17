<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\Blog;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function shareOrUnshare(Blog $blog){
        $userId = auth()->id();
        $existingShare = Share::where('user_id', $userId)
                            ->where('blog_id', $blog->id)
                            ->first();
    
        if ($existingShare) {
            $existingShare->delete();
        } else {
            Share::create([
                'user_id' => $userId,
                'blog_id' => $blog->id
            ]);
        }
        return back(); 
    }
}
