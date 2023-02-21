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

    // Status Image Category
    Route::view('admin/status_image_category', 'Admin/Master/status_image_category', ['title' => 'status_image_category']);
    Route::get('admin/status_image_category_list', [MasterController::class, 'status_image_category_list'])->name('status_image_category_list');  // list
    Route::post('admin/add_status_image_category', [MasterController::class, 'add_status_image_category']);
    Route::post('admin/delete_status_image_category', [MasterController::class, 'delete_status_image_category']);
    Route::post('admin/get_status_image_category_data', [MasterController::class, 'get_status_image_category_data']);

    // Status Image
    Route::view('admin/status_image', 'Admin/Master/status_image', ['title' => 'status_image']);
    Route::get('admin/status_images_list', [MasterController::class, 'status_images_list'])->name('status_images_list');  // list
    Route::post('admin/get_status_image_Category', [MasterController::class, 'get_status_image_Category']);
    Route::post('admin/add_status_images', [MasterController::class, 'add_status_images']);
    Route::post('admin/delete_status_images', [MasterController::class, 'delete_status_images']);
    Route::post('admin/get_status_images_data', [MasterController::class, 'get_status_images_data']);

    // App By Image Category
    Route::view('admin/app_by_image_category', 'Admin/Master/app_by_image_category', ['title' => 'app_by_image_category']);
    Route::post('admin/getApp', [MasterController::class, 'getApp']);
    Route::post('admin/add_app_by_image_category', [MasterController::class, 'add_app_by_image_category']);
    Route::get('admin/app_by_image_category_list', [MasterController::class, 'app_by_image_category_list'])->name('app_by_image_category_list');  // list
    Route::post('admin/delete_app_by_image_category', [MasterController::class, 'delete_app_by_image_category']);
    Route::post('admin/get_app_by_image_category_data', [MasterController::class, 'get_app_by_image_category_data']);

    //Status Video Category
    Route::view('admin/status_video_category', 'Admin/Master/status_video_category', ['title' => 'status_video_category']);
    Route::get('admin/status_video_category_list', [MasterController::class, 'status_video_category_list'])->name('status_video_category_list');  // list
    Route::post('admin/add_status_video_category', [MasterController::class, 'add_status_video_category']);
    Route::post('admin/delete_status_video_category', [MasterController::class, 'delete_status_video_category']);
    Route::post('admin/get_status_video_category_data', [MasterController::class, 'get_status_video_category_data']);

    //Status Video 
    Route::view('admin/status_video', 'Admin/Master/status_video', ['title' => 'status_video']);
    Route::get('admin/status_videos_list', [MasterController::class, 'status_videos_list'])->name('status_videos_list');  // list
    Route::post('admin/get_status_video_Category', [MasterController::class, 'get_status_video_Category']);
    Route::post('admin/add_status_videos', [MasterController::class, 'add_status_videos']);
    Route::post('admin/delete_status_videos', [MasterController::class, 'delete_status_videos']);
    Route::post('admin/get_status_videos_data', [MasterController::class, 'get_status_videos_data']);
});

// WEB Site
Route::view('/', 'Web/home');
Route::view('/about', 'Web/infopage');
