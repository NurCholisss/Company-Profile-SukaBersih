<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SearchController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminContactController;

//Public Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', [SearchController::class, 'index'])->name('search');


//Authentication Routes

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


//Admin Routes 

Route::prefix('admin')->middleware(['auth',\App\Http\Middleware\RoleMiddleware::class.':admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Products
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Gallery
    Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create', [AdminGalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('admin. gallery.store');
    Route::get('/gallery/{gallery}/edit', [AdminGalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/gallery/{gallery}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');
    Route::post('/admin/gallery', [AdminGalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/gallery/{gallery}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // Messages
    Route::get('/messages', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/messages/{message}', [AdminContactController::class, 'show'])->name('admin.contact.show');
    Route::delete('/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
    Route::post('/{contact}/mark-as-read', [AdminContactController::class, 'markAsRead'])->name('admin.contact.markAsRead');
});
