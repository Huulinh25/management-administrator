<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; 

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
Auth::routes();





Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'edit'])->name('profile');
Route::post('/admin/profile', [App\Http\Controllers\HomeController::class, 'update'])->name('profile');


// Route::get('/pages-profile', function(){
//     return view('pages-profile');
// })->name('pages-profile');

