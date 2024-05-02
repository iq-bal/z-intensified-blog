<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create(){
        return view('register');
    }

    // create new user 
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user= User::create($formFields);

        //Login
        auth()->login($user); 

        return redirect('/');
        // ->with('message','User Created and logged in'); 
    }
    // show login form
    public function login(){
        return view('login'); 
    }

    // Logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
        // ->with('message','You have been logged out!'); 
    }

    // Authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
            // ->with('message','You are now logged in');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }

    //show single user
    public function show(User $user){
        // dd($user);
        // dd(User::find(3)->blogs);
        return view('single-profile',[
            'user'=>$user,
            'blogs'=>User::find($user->id)->blogs
        ]);
    }

    // return form for editing a profile
    public function edit(User $user){
        return view('edit-profile',[
            'user'=>$user
        ]);
    }

    // update a user
    public function update( Request $request, User $user){

        if($user->id!=auth()->id()){
            abort(403,'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'interest' => 'nullable',
            'bio' => 'nullable',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'dp_image' => 'nullable|image',
            'hobbies' => 'nullable',
        ]);

        if ($request->hasFile('dp_image')) {
            $formFields['dp_image'] = $request->file('dp_image')->store('dp_images', 'public');
        }

        $user->update($formFields);
        return back();
    }
}
