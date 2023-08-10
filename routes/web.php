<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
// ------- main page -------



// home page

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');

    // guest
    Route::middleware(['guest'])->group(function () {
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
    });

    // auth
    Route::middleware(['auth', 'active'])->group(function () {
        Route::post('logout', 'logout')->name('logout');
        Route::post('Contact_form', 'Contact_Form')->name('Contact_Form');
    });
});

Route::controller(ProfileController::class)->group(function () {
    Route::middleware(['auth', 'active'])->group(function () {
        Route::get('profile', 'profile')->name('profile');
        Route::get('Settings', 'settings')->name('Settings');
        Route::post('UpdateImage', 'Update_Image')->name('UpdateImage');
        Route::delete('RemoveImage', 'Remove_Image')->name('RemoveImage');
        Route::post('change_password', 'change_password')->name('change_password');
        Route::post('user_info', 'user_info')->name('user_info');
        Route::post('privacy', 'privacy')->name('privacy');
    });
});

Route::controller(AdminController::class)->group(function () {
    Route::middleware(['auth', 'admin', 'active'])->prefix('admin')->group(function () {
        Route::get('/', 'admin')->name('admin');
        Route::get('/user/active', 'admin_user')->name('admin_user');
        Route::post('/deactivateUser/{user_id}', 'deactivateUser')->name('deactivateUser');
        Route::post('/activateUser/{user_id}', 'activateUser')->name('activateUser');
        Route::get('/user/inactive', 'inactiveUser')->name('inactiveUser');
        Route::get('/user/edit/{user_id}', 'editUser')->name('editUser');
        Route::post('UpdateImageAdmin', 'Update_Image_Admin')->name('UpdateImageAdmin');
        Route::delete('RemoveImageAdmin', 'Remove_Image_admin')->name('RemoveImageAdmin');
        Route::post('user_info_admin', 'user_info_admin')->name('user_info_admin');
        Route::get('/messages', 'AdminMessages')->name('AdminMessages');
        Route::delete('/delete_message/{id}', 'delete_message')->name('delete_message');
        Route::get('/message/{id}', 'view_message')->name('view_message');
        Route::get('/search',  'search')->name('search');
        Route::get('/promote',  'promote')->name('promote');
        Route::get('/promote/{user_id}',  'promote_user')->name('promote_user');
        Route::post('/promoteAdmin/{id}',  'promoteAdmin')->name('promoteAdmin');
        Route::post('/promoteUser/{id}',  'promoteUser')->name('promoteUser');
        Route::post('/promoteMode/{id}',  'promoteMode')->name('promoteMode');
        Route::get('/search_promote',  'search_promote')->name('search_promote');
    });
});

Route::controller(BookController::class)->prefix('books')->group(function () {
    Route::get("all_books", "AllBooks")->name('all_books');
    Route::get('/search',  'search_book')->name('search_book');


    // categories
    Route::get("Category/{category}", "category")->name('Category');
    Route::get('/searching',  'searching_book')->name('searching_book');


    // single book
    Route::get('book_name/{book_name}', 'single_book')->name('single_book');

    Route::middleware(['auth', 'active'])->group(function () {
        // book download and read
        Route::get('/download-pdf/{bookId}', 'downloadPDF')->name('download_pdf');
        Route::get('/pdf/{bookId}', 'embed_pdf')->name('embed_pdf');
        Route::post('/comment/{bookId}', 'comment')->name('comment');
        Route::delete('commentDelete', 'commentDelete')->name('commentDelete');
        Route::get('AllComment/{bookId}', 'AllComment')->name('AllComment');

    });

    Route::middleware(['auth', 'mode_admin', 'active'])->group(function () {
        Route::get('/add_book', 'Add_Book')->name('Add_Book');
        Route::post('/book_store', 'book_store')->name('book_store');
    });
});



//-------- languages ---------
Route::get('languageConvert/{local}', [PreferencesController::class, 'Language_converter'])->name('languageConvert');
