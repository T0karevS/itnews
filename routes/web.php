<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::view('/', 'index')->name('home');
Route::name('user.')->group(function(){
    // Route::view('/private', 'private')->middleware('auth')->name('private');
    

    Route::get('/login', function(){
        if(Auth::check()){   
            return redirect('/');
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');
    
    Route::get('registration', function(){
        if(Auth::check()){   
            return redirect('/');
        }
        return view('registration');
    })->name('registration');
    Route::post('/registration', [RegisterController::class, 'save']);
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\PostController::class, 'newPost'])->name('user.home.post');
Route::get('/', [App\Http\Controllers\PostController::class, 'getPost'])->name('user.home.getPosts');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'UpdPost'])->name('user.profile.UpdPost');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('user.profile.store');
// Route::get('/post/{id}', [NewsController::class, 'getComment'])->name('user.news.comments');
Route::post('/post/', [NewsController::class, 'newComment'])->name('user.news.comments');
Route::get('/user/{id}', [ProfileController::class, 'index']);
Route::get('/post/{id}', [NewsController::class, 'index'])->name('user.news.post');
Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'getPost'])->name('admin');
Route::delete('/post/delete/{id}', [AdminController::class, 'DeletePost'])->name('user.admin.delete');
