<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionsController;
use App\Http\Controllers\Auth\RegisteredUserController;


//Route::get('/', function () {
//    return view('welcome')->name('home');
//});

//Si no devolvemos nada, podemos acortar la sintaxis asi:

Route::view('/', 'welcome')->name('home');
Route::view('/contact', 'contact')->name('contact');

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
Route::get('blog/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('blog/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



Route::view('/about', 'about')->name('about');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionsController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionsController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
