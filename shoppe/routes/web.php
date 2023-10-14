<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CountryController;


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



Route::get('/', function(){
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [UploadController::class, 'edit'])->name('profile');
    Route::post('/profile', [UploadController::class, 'update'])->name('profile');

    Route::prefix('country')->name('country.') ->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('country');

        Route::get('/addCountry', [CountryController::class, 'addCountry'])->name('addCountry'); // form thêm
        Route::post('/addCountry', [CountryController::class, 'postCountry'])->name('postCountry'); // form thêm


        Route::get('/edit/{id}', [CountryController::class, 'getEditCountry'])->name('getEditCountry');
        Route::post('/edit/{id}', [CountryController::class, 'postEditCountry'])->name('postEditCountry');

        Route::get('/delete/{id}', [CountryController::class, 'deleteCountry'])->name('deleteCountry');

        //test DATA
        // Route::get('/getCountry', [CountryController::class, 'getCountry'])->name('getCountry');
    });


    // Route::get('/country', [CountryController::class, 'index'])->name('getcountry');

});

// Route::get('/pages-profile', function(){
//     return view('pages-profile');
// })->name('pages-profile');

