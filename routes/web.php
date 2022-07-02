<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'public.index');

Route::view('/about-us', 'public.about')->name('about');

Route::view('/about/services', 'public.services')->name('services');

Route::view('/contact', 'public.contact')->name('contact');

Route::post('/contact', [Authenticate::class, 'contact']);

Route::prefix('loan')->group(function () {
    Route::get('/apply', function () {
        return view('public.application');
    })->name('application');

    Route::view('/terms', 'public.terms')->name('terms');

    Route::view('/requirements', 'public.requirements')->name('requirements');
});

Route::view('/terms', 'public.terms')->name('terms');

Route::view('/faq', 'public.faq')->name('faq');

Route::view('/requirements', 'public.requirements')->name('requirements');

Route::view('/testimonials', 'public.testimonials')->name('testimonials');

Route::view('/privacy-policy', 'public.privacy-policy')->name('privacy-policy');

Route::view('/loan/apply/success', 'public.success')->middleware('regsuccess');
Route::get("/login", [Authenticate::class, "index"])->name('login')->middleware('guest');

Route::post("/login", [Authenticate::class, "submit"]);

// Admin Routes
// Route::redirect('/admin', '/admin/dashboard');
Auth::check();

Route::get("/logout", [Authenticate::class, "logout"])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard');
    // View Applications
    Route::get('/view/applications', [AdminController::class, 'viewApplications'])->name('applications');
    // Ajax get application details 
    Route::get('/view/application/{application:id}', [AdminController::class, "getApplication"]);
    // Delete Application
    Route::delete('/view/application', [AdminController::class, 'deleteApplication'])->name('deleteApplication');

    // View Users
    Route::get('/view/users', [AdminController::class, 'showUsers'])->name('users');

    // View Admin
    Route::get('/view/admin', [AdminController::class, 'showAdmin'])->name('admins');

    Route::get('site-settings', function () {
        return view('admin.site-settings');
    })->name('site-settings');

    // Update admin records
    Route::get('/admin/update', function () {
        return view('admin.update-admin');
    })->name('update-admin');

    // Delete Admin
    Route::delete("/view.admin", [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

    // User Profile
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('profile');

    //Update Profile
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('updateProfile');

    // Show change Password
    Route::get('/password', function () {
        return view('admin.password');
    })->name('password');

    // Change Password
    Route::put('/password', [AdminController::class, 'changePassword'])->name('changePassword');

});
