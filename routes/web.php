<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/events', [\App\Http\Controllers\HomeController::class, 'events'])->name('events');
Route::get('/galleries', [\App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [\App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [\App\Http\Controllers\HomeController::class, 'blogDetails'])->name('blogs.show');
Route::get('/testimonials', [\App\Http\Controllers\HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/join', [\App\Http\Controllers\HomeController::class, 'join'])->name('join');
Route::post('/join', [\App\Http\Controllers\HomeController::class, 'storeJoin'])->name('join.submit');

Route::get('/login', [\App\Http\Controllers\Member\MemberAuthController::class, 'showLoginForm'])->name('login');

Route::post('/contact', [\App\Http\Controllers\MessageController::class, 'store'])->name('contact.submit');


Route::get('/admin/login', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.alias');
    
    // Member Routes
    Route::resource('members', \App\Http\Controllers\MemberController::class)->names([
        'index' => 'admin.members',
        'create' => 'admin.members.create',
        'store' => 'admin.members.store',
        'show' => 'admin.members.show',
        'edit' => 'admin.members.edit',
        'update' => 'admin.members.update',
        'destroy' => 'admin.members.destroy',
    ]);
    Route::resource('events', \App\Http\Controllers\EventController::class)->names([
        'index' => 'admin.events',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);
    Route::resource('gallery', \App\Http\Controllers\GalleryController::class)->names([
        'index' => 'admin.gallery',
        'create' => 'admin.gallery.create',
        'store' => 'admin.gallery.store',
        'show' => 'admin.gallery.show',
        'edit' => 'admin.gallery.edit',
        'update' => 'admin.gallery.update',
        'destroy' => 'admin.gallery.destroy',
    ]);
    
    Route::resource('blogs', \App\Http\Controllers\BlogController::class)->names([
        'index' => 'admin.blogs',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);
    Route::resource('testimonials', \App\Http\Controllers\TestimonialController::class)->names([
        'index' => 'admin.testimonials',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'show' => 'admin.testimonials.show',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ]);
    Route::resource('leaderboard', \App\Http\Controllers\RiderController::class)->names([
        'index' => 'admin.leaderboard',
        'create' => 'admin.leaderboard.create',
        'store' => 'admin.leaderboard.store',
        'show' => 'admin.leaderboard.show',
        'edit' => 'admin.leaderboard.edit',
        'update' => 'admin.leaderboard.update',
        'destroy' => 'admin.leaderboard.destroy',
    ]);
    Route::resource('safety', \App\Http\Controllers\SafetyRuleController::class)->names([
        'index' => 'admin.safety',
        'create' => 'admin.safety.create',
        'store' => 'admin.safety.store',
        'show' => 'admin.safety.show',
        'edit' => 'admin.safety.edit',
        'update' => 'admin.safety.update',
        'destroy' => 'admin.safety.destroy',
    ]);
    Route::resource('messages', \App\Http\Controllers\MessageController::class)->only(['index', 'show', 'destroy'])->names([
        'index' => 'admin.messages',
        'show' => 'admin.messages.show',
        'destroy' => 'admin.messages.destroy',
    ]);
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::resource('users', \App\Http\Controllers\UserController::class)->names([
        'index' => 'admin.users',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});

// Member Routes
Route::get('/member/login', [\App\Http\Controllers\Member\MemberAuthController::class, 'showLoginForm'])->name('member.login');
Route::post('/member/login', [\App\Http\Controllers\Member\MemberAuthController::class, 'login'])->name('member.login.submit');
Route::post('/member/logout', [\App\Http\Controllers\Member\MemberAuthController::class, 'logout'])->name('member.logout');

Route::prefix('member')->middleware('auth:members')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Member\MemberDashboardController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/profile', [\App\Http\Controllers\Member\MemberDashboardController::class, 'profile'])->name('member.profile');
    Route::post('/profile', [\App\Http\Controllers\Member\MemberDashboardController::class, 'updateProfile'])->name('member.profile.update');
});

