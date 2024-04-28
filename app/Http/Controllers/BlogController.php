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

    // page for creating blog
    public function create(){
        return view('create'); 
    }

    // store blog post
    public function store(Request $request){
        // dd(request()->all()); 
        // photo upload er jonno fileSystem a public kore dite hbe
        $formFields = $request->validate([
            'title'=> 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
            'author'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        // php artisan storage:link
        Blog::create($formFields);

        return redirect('/');
        // ->with('message','Listing created successfully!'); 
    }

    // show edit form
    public function edit(Blog $blog){
        return view('edit',['blog'=>$blog]);
    }

    // update blog
    public function update(Request $request, Blog $blog){
        $formFields = $request->validate([
            'title'=> 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
            'author'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $blog->update($formFields);
        return back();
        // ->with('message','Listing updated successfully!'); 
    }

    // delete a blog
    public function destroy(Blog $blog){
        $blog->delete();
        return redirect('/');
        // ->with('message','Listing Deleted Succesfully');
    }
}
