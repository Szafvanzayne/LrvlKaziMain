<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; 
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category'); 
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category'); 



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $users = User::all();

        // using query builder 
        //$users = DB::table('users')->get();

        return view('dashboard',compact('users'));
    })->name('dashboard');
});


