<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\UploadProfileController; 
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;



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
    
    // PROFILE
    Route::get('/profile', [UploadProfileController::class, 'edit'])->name('profile');
    Route::post('/profile', [UploadProfileController::class, 'update'])->name('profile');

    //COUNTRY
    Route::prefix('country')->name('country.') ->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('country');

        //test DATA
        // Route::get('/getCountry', [CountryController::class, 'getCountry'])->name('getCountry');
        Route::get('/addCountry', [CountryController::class, 'addCountry'])->name('addCountry'); // form thêm
        Route::post('/addCountry', [CountryController::class, 'postCountry'])->name('postCountry'); // form thêm


        Route::get('/edit/{id}', [CountryController::class, 'getEditCountry'])->name('getEditCountry');
        Route::post('/edit/{id}', [CountryController::class, 'postEditCountry'])->name('postEditCountry');

        Route::get('/delete/{id}', [CountryController::class, 'deleteCountry'])->name('deleteCountry');
        
        
    });

    // //BLOG
    Route::prefix('blog')->name('blog.') ->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog');
        // Route::get('/getBlog', [BlogController::class, 'getBlog'])->name('getBlog'); // test data Blog

        Route::get('/addBlog', [BlogController::class, 'addBlog'])->name('addBlog'); // form thêm Blog
        Route::post('/addBlog', [BlogController::class, 'postBlog'])->name('postBlog'); // form thêm Blog

        Route::get('/editBlog/{id}', [BlogController::class, 'getEditBlog'])->name('getEditBlog'); // form edit Blog
        Route::post('/editBlog/{id}', [BlogController::class, 'postEditBlog'])->name('postEditBlog');
        

        Route::get('/delete/{id}', [BlogController::class, 'deleteBlog'])->name('deleteBlog');


    });


});

// Route::get('/pages-profile', function(){
//     return view('pages-profile');
// })->name('pages-profile');

