<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Authenticate;

// ADMIN Site
Route::get('/admin/login', function () {
    return view('admin.auth.login');
});
Route::controller(LoginController::class)->group(function () {
    Route::get('/admin', 'login')->name('login');
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/admin/login_data', 'login_data');
    Route::get('/admin/logout', 'logout');
});
Auth::routes();
Route::middleware([Authenticate::class])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [MasterController::class, 'dashboard']);

    // User
    Route::view('admin/user', 'Admin/Master/user', ['title' => 'user']);
    Route::get('admin/user_list', [MasterController::class, 'user_list'])->name('admin/user_list');  // list
    Route::post('admin/add_user', [MasterController::class, 'add_user']);
    Route::post('admin/delete_user_data', [MasterController::class, 'delete_user_data']);
    Route::post('admin/get_user_data', [MasterController::class, 'get_user_data']);

    // Image Category
    Route::view('admin/image_category', 'Admin/Master/image_category', ['title' => 'image_category']);
    Route::get('admin/image_category_list', [MasterController::class, 'image_category_list'])->name('admin/image_category_list');  // list
    Route::post('admin/add_image_category', [MasterController::class, 'add_image_category']);
    Route::post('admin/delete_image_category', [MasterController::class, 'delete_image_category']);
    Route::post('admin/get_image_category_data', [MasterController::class, 'get_image_category_data']);

    // Images
    Route::view('admin/images', 'Admin/Master/images', ['title' => 'images']);
    Route::get('admin/images_list', [MasterController::class, 'images_list'])->name('admin/images_list');  // list
    Route::post('admin/get_image_Category', [MasterController::class, 'get_image_Category']);
    Route::post('admin/add_images', [MasterController::class, 'add_images']);
    Route::post('admin/delete_images', [MasterController::class, 'delete_images']);
    Route::post('admin/get_images_data', [MasterController::class, 'get_images_data']);

    //Video Category
    Route::view('admin/video_category', 'Admin/Master/video_category', ['title' => 'video_category']);
    Route::get('admin/video_category_list', [MasterController::class, 'video_category_list'])->name('admin/video_category_list');  // list
    Route::post('admin/add_video_category', [MasterController::class, 'add_video_category']);
    Route::post('admin/delete_video_category', [MasterController::class, 'delete_video_category']);
    Route::post('admin/get_video_category_data', [MasterController::class, 'get_video_category_data']);

    //Videos 
    Route::view('admin/videos', 'Admin/Master/videos', ['title' => 'videos']);
    Route::get('admin/videos_list', [MasterController::class, 'videos_list'])->name('admin/videos_list');  // list
    Route::post('admin/get_video_Category', [MasterController::class, 'get_video_Category']);
    Route::post('admin/add_videos', [MasterController::class, 'add_videos']);
    Route::post('admin/delete_videos', [MasterController::class, 'delete_videos']);
    Route::post('admin/get_videos_data', [MasterController::class, 'get_videos_data']);
});

// WEB Site
Route::view('/', 'Web/home');
Route::view('/about', 'Web/infopage');
