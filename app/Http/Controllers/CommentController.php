<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // post a comment
    public function store(Request $request, Blog $blog){
        // dd(request()->all()); 
        // dd($blog->id); 
        $formFields = $request->validate([
            'comment'=> 'required',
        ]);
        $formFields['blog_id'] = $blog->id; 
        $formFields['user_id'] = auth()->id(); 
        Comment::create($formFields);
        return back();
    }
}
