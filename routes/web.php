<?php

use GeminiAPI\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\CommentController;



//get all blogs 
Route::get('/', [BlogController::class,'index']);

// form for creating blog post
Route::get('/blogs/create',[BlogController::class,'create'])->middleware('auth');

// store blog post
Route::post('/blogs',[BlogController::class,'store'])->middleware('auth'); 

// show edit form 
Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->middleware('auth');

// update blog
Route::put('/blogs/{blog}', [BlogController::class,'update'])->middleware('auth');

// delete a blog
Route::delete('/blogs/{blog}', [BlogController::class,'destroy'])->middleware('auth');

// post a comment 
Route::post('/blogs/{blog}/comment',[CommentController::class,'store']);

// add a like or dislike
Route::get('/blogs/{blog}/likes', [LikeController::class,'likeOrDislike'])->middleware('auth');

// share a blog
Route::get('/blogs/{blog}/shares', [ShareController::class,'shareOrUnshare'])->middleware('auth');

// manage listing route
Route::get('/blogs/manage',[BlogController::class,'manage'])->middleware('auth');




//get single blog
Route::get('/blogs/{blog}', [BlogController::class,'show']);

// show register/create form 
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// create new user
Route::post('/users',[UserController::class, 'store']);

// Log User out 
Route::post('/logout',[UserController::class,'logout'])->middleware('auth')->middleware('auth');

//show login form
Route::get('/login',[UserController::class,'login'])->middleware('guest')->name('login');

// log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

// form for editing a user
Route::get('users/{user}/edit',[UserController::class,'edit']);

// update an user information
Route::put('users/{user}',[UserController::class,'update']);

//get single user
Route::get('/users/{user}',[UserController::class,'show'])->middleware('auth');



// follow a user
// routes/web.php
Route::get('/users/{user}/follow', [UserController::class,'follow']);

// followers
Route::get('/users/{user}/followers', [UserController::class, 'followers']);

// following
Route::get('/users/{user}/following',[UserController::class,'following']);


//chat room
Route::get('/chat-room',function(){
    $user = auth()->user()->name; 
    return view('z-cast.lobby',['user'=>$user]);
})->middleware('auth');

Route::get('/room.php',function(){
    // dd(request());
    return view('z-cast.room'); 
})->middleware('auth');


// explore users
Route::get('/search-user',[UserController::class,'index'] );


// test route, will be deleted
Route::get('/test',function(){
    print Gemini::generateText('PHP in less than 100 chars');
});



Route::get('/summarize/{blog}', [BlogController::class, 'summarize'])->name('blogs.summarize');

Route::get('/sentiment/{blog}',[BlogController::class,'sentiment']);

Route::get('/comments/{comment}',[CommentController::class,'destroy']);


