<?php

use App\Http\Controllers\BasicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TestimonialController;
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

Route::get('/', function () {
    return view('welcome');
});




// admin routes dashboard
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [BasicController::class, 'dashboard'])->name('dashboard');

    // Category
    Route::get('/categories' , [CategoryController::class , 'index'] )->name('admin-categories');
    Route::get('/categories/create' , [CategoryController::class , 'create'] )->name('admin-categories-create');
    Route::post('/categories/store' , [CategoryController::class , 'store'] )->name('admin-categories-store');
    Route::get('/categories/edit/{category}' , [CategoryController::class , 'edit'])->name('admin-categories-edit');
    Route::patch('/categories/update/{category}' , [CategoryController::class , 'update'])->name('admin-categories-update');
    Route::delete('/categories/delete/{category}' , [CategoryController::class , 'destroy'])->name('admin-categories-delete');

    // Products

    Route::get('/products' , [ProductsController::class , 'index'] )->name('admin-products');
    Route::get('/products/create' , [ProductsController::class , 'create'] )->name('admin-products-create');
    Route::post('/products/store' , [ProductsController::class , 'store'] )->name('admin-products-store');
    Route::get('/products/edit/{product}' , [ProductsController::class , 'edit'])->name('admin-products-edit');
    Route::get('/products/{product:slug}', [ProductsController::class , 'show'])->name('admin-products-show');
    Route::patch('/products/update/{product}' , [ProductsController::class , 'update'])->name('admin-products-update');
    Route::delete('/products/delete/{product}' , [ProductsController::class , 'destroy'])->name('admin-products-delete');

    //testimonial

    Route::get('/testimonials' , [TestimonialController::class , 'index'] )->name('admin-testimonials');
    Route::get('/testimonials/create' , [TestimonialController::class , 'create'] )->name('admin-testimonials-create');
    Route::post('/testimonials/store' , [TestimonialController::class , 'store'] )->name('admin-testimonials-store');
    Route::get('/testimonials/edit/{testimonial}' , [TestimonialController::class , 'edit'])->name('admin-testimonials-edit');
    Route::patch('/testimonials/update/{testimonial}' , [TestimonialController::class , 'update'])->name('admin-testimonials-update');
    Route::delete('/testimonials/delete/{testimonial}' , [TestimonialController::class , 'destroy'])->name('admin-testimonials-delete');



    //chefs

    Route::get('/chefs' , [ChefController::class , 'index'] )->name('admin-chefs');
    Route::get('/chefs/create' , [ChefController::class , 'create'] )->name('admin-chefs-create');
    Route::post('/chefs/store' , [ChefController::class , 'store'] )->name('admin-chefs-store');
    Route::get('/chefs/edit/{chef}' , [ChefController::class , 'edit'])->name('admin-chefs-edit');
    Route::get('/chefs/{chef}', [ChefController::class , 'show'])->name('admin-chefs-show');
    Route::patch('/chefs/update/{chef}' , [ChefController::class , 'update'])->name('admin-chefs-update');
    Route::delete('/chefs/delete/{chef}' , [ChefController::class , 'destroy'])->name('admin-chefs-delete');

    //reservations

    Route::get('/reservation' , [ReservationController::class , 'index'] )->name('admin-reservation');
    Route::get('/reservation/edit/{reservation}' , [ReservationController::class , 'edit'])->name('admin-reservation-edit');
    Route::patch('/reservation/update/{reservation}' , [ReservationController::class , 'update'])->name('admin-reservation-update');
    Route::delete('/reservation/delete/{reservation}' , [ReservationController::class , 'destroy'])->name('admin-reservation-delete');


    //contact

    Route::get('/contact' , [ContactController::class , 'index'] )->name('admin-contact');
    Route::get('/contact/edit/{contact}' , [ContactController::class , 'edit'])->name('admin-contact-edit');
    Route::get('/contact/{contact}', [ContactController::class , 'show'])->name('admin-contact-show');
    Route::patch('/contact/update/{contact}' , [ContactController::class , 'update'])->name('admin-contact-update');
    Route::delete('/contact/delete/{contact}' , [ContactController::class , 'destroy'])->name('admin-contact-delete');
});

    Route::get('/' , [HomeController::class , 'home'])->name('home');
    Route::post('/reservation/store' , [ReservationController::class , 'store'] )->name('admin-reservation-store');
    Route::post('/contact/store' , [ContactController::class , 'store'] )->name('admin-contact-store');

require __DIR__.'/auth.php';
