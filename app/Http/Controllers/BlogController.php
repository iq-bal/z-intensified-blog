<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Blog;
use App\Models\User;
use GeminiAPI\Laravel\Facades\Gemini;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        // dd(request());
        return view('blog',[
            'blogs'=>Blog::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    // show single listings
    public function show(Blog $blog){
        // dd(Blog::find($blog->id)->comments);
        return view('show', [
            'blog' => $blog,
            'comments'=>Blog::find($blog->id)->comments
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
            'tags' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->id();
        $formFields['email'] = auth()->user()->email; 
        $formFields['author'] = auth()->user()->name; 
        
        $post = Blog::create($formFields);
        
        $followers = User::find(auth()->id())->followers;
        foreach ($followers as $follower) {
            $announcement = Announcement::create([
                'blog_id' => $post->id,
                'created_by' => auth()->id()
            ]);
            $announcement->users()->attach($follower->id); // Attach the user to the announcement
        }
        return redirect('/');
        // ->with('message','Listing created successfully!'); 
    }

    // show edit form
    public function edit(Blog $blog){
        return view('edit',['blog'=>$blog]);
    }

    // update blog
    public function update(Request $request, Blog $blog){
        if($blog->user_id!=auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title'=> 'required',
            // 'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
            // 'author'=>'required'
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

        if($blog->user_id!=auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $blog->delete();
        return redirect('/');
        // ->with('message','Listing Deleted Succesfully');
    }

    public function manage(){
        // dd(auth()->user()->blogs()->get());
        return view('manage',['blogs'=>auth()->user()->blogs()->get()]);
    }

    public function summarize(Blog $blog){
        $command = 'summmarize this blog: '.$blog->description; 
        $summary = Gemini::generateText($command); 
        return response()->json(['summary' => $summary]);
    }

}
