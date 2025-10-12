<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;

//ENDPOINTS
Route::get('/', function () {
    return view('welcome');
});
Route::get("/contact",function(){
    return view('contacto');
});
Route::get("/post",function(){
    return view('post');
});
Route::get("/about",function(){
    return view('about');
});

Route::group(['prefix'=>'dashboard'],function(){
    Route::resource('/',DashboardController::class);
    Route::resource('/posts',PostsController::class);
    Route::get('/posts/actions/add',[PostsController::Class,'showAdd']);
    Route::get("/users",[UsersController::class,'getUsers']);
    Route::post("/users",[UsersController::class,'createUsers']);
});

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/admin/post_add', [PostsController::class, 'showAdd'])->name('posts.add');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

