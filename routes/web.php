<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
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

use App\Models\User;

Route::get('/', function () {


//    User::query()->create([
//        "name" => "Admin",
//        "role" => "admin",
//        "email" => "admin@gmail.com",
//        "email_verified_at" => now(),
//        "password" => bcrypt(12312352)
//    ]);
//
//    User::query()->create([
//        "name" => "Moderator",
//        "role" => "moderator",
//        "email" => "moderator@gmail.com",
//        "email_verified_at" => now(),
//        "password" => bcrypt(12312352)
//    ]);

    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("activity.power")->prefix("admin")->group(function (){
    Route::resource("products",ProductController::class);
});
