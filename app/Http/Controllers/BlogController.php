<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        // dd(request());
        return view('blog',[
            // 'blogs'=>Blog::all()
            'blogs'=>Blog::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    // show single listings
    public function show(Blog $blog){
        return view('show', [
            'blog' => $blog
        ]);
    }
}
