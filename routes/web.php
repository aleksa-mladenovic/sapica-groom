<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\DogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\Admin\WorksController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\AppointmentsController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WhishlistController;


Route::get('/', [FrontendController::class, 'index']);

// Gallery
Route::get('gallery', [WorksController::class, 'gallery']);
Route::get('view-work/{work_slug}', [WorksController::class, 'view']);

// Search items
Route::get('product-list', [FrontendController::class, 'productlistSearchBar']);
Route::post('search', [FrontendController::class, 'search']);

// Shop view
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'view_category']);
// Products view
Route::get('view-category/{cate_slug}/{prod_slug}', [FrontendController::class, 'view_product']);

// Add to cart (calling trought ajax)
Route::post('add-to-cart', [CartController::class, 'addProduct']);
// Add to wishlist (calling trought ajax)
Route::post('/add-to-wishlist', [WhishlistController::class, 'addProduct']);
// Cart/Whishilist count
Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-data', [WhishlistController::class, 'wishlistcount']);

// Appointments
Route::get('appointments', [AppointmentsController::class, 'index']);
Route::get('make-appointment', [AppointmentsController::class, 'add']);

// User
Route::middleware(['auth'])->group(function(){
  // Profile
  Route::get('profile', [FrontendController::class , 'profile']);
  Route::put('edit-profile', [FrontendController::class , 'updateUser']);
  // Dogos
  Route::get('add-dog', [DogController::class , 'add']);
  Route::post('insert-dog', [DogController::class , 'insert']);
  Route::put('edit-dog/{dog_name}', [DogController::class , 'update']);

   // Cart view
   Route::get('cart', [CartController::class, 'view']);
   Route::post('delete-card-item', [CartController::class, 'delete']);
   Route::post('update-cart', [CartController::class, 'update']);

   // Checkout view
   Route::get('checkout', [CheckoutController::class, 'index']);
   Route::post('place-order', [CheckoutController::class, 'placeorder']);

   // Orders view
   Route::get('my-orders', [UserController::class, 'index']);
   Route::get('vies-order/{id}', [UserController::class, 'view']);

   // Whislist view
   Route::get('whislist', [WhishlistController::class, 'index']);
   Route::post('delete-wishlist-item', [WhishlistController::class, 'delete']);

   // Ratings
   Route::post('add-rating', [RatingController::class, 'add']);

   // Review
   Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
   Route::post('add-review', [ReviewController::class, 'create']);
   Route::get('edit-review/{product_slug}', [ReviewController::class, 'edit']);
   Route::put('update-review', [ReviewController::class, 'update']);
   
   // Appointment
   Route::post('insert-appointment', [AppointmentsController::class, 'insert']);
   Route::get('my-appointments', [AppointmentsController::class, 'myappointments']);
   Route::get('cancle-appointment/{id}', [AppointmentsController::class, 'cancel']);
});

Auth::routes();

// Admin
Route::middleware(['auth', 'isAdmin'])->group(function(){
   Route::get('dashboard', [DashboardController::class, 'index']);

   // Appointments related routes
   // Control tabe
   Route::get('admin-appointments', [AppointmentsController::class, 'admin_index']);
   // Edit/Delete work
   Route::get('edit-appointment/{id}', [AppointmentsController::class, 'edit']);
   Route::put('update-appointment/{id}', [AppointmentsController::class, 'update']);
   Route::get('delete-appointment/{id}', [AppointmentsController::class, 'destroy']);


   // Works related routes
   // Control tabe
   Route::get('works', [WorksController::class, 'index']);
   // Add new work
   Route::get('add-work', [WorksController::class, 'add']);
   Route::post('insert-work', [WorksController::class, 'insert']);
   // Edit/Delete work
   Route::get('edit-work/{id}', [WorksController::class, 'edit']);
   Route::put('update-work/{id}', [WorksController::class, 'update']);
   Route::get('delete-work/{id}', [WorksController::class, 'destroy']);

   // Categories related routes
   // Control tabe
   Route::get('categories', [CategoryController::class, 'index']);
   // Add new category
   Route::get('add-category', [CategoryController::class, 'add']);
   Route::post('insert-category', [CategoryController::class, 'insert']);
   // Edit/Delete category
   Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
   Route::put('update-category/{id}', [CategoryController::class, 'update']);
   Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

   // Products related routes
   // Control tabel
   Route::get('products', [ProductController::class, 'index']);
   // Add new category
   Route::get('add-product', [ProductController::class, 'add']);
   Route::post('insert-product', [ProductController::class, 'insert']);
   // Edit/Delete category
   Route::get('edit-product/{id}', [ProductController::class, 'edit']);
   Route::put('update-product/{id}', [ProductController::class, 'update']);
   Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

   // Orders related routes
   // Orders tabel
   Route::get('admin-orders', [OrderController::class, 'index']);
   Route::get('admin-orders/pdf', [OrderController::class, 'pdf']);
   Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
   Route::put('update-order/{id}', [OrderController::class, 'update']);
   Route::get('order-history', [OrderController::class, 'history']);

   // Users related routes
   // Users tabel
   Route::get('admin-users', [ProfilesController::class, 'index']);
   Route::get('admin/view-user/{id}', [ProfilesController::class, 'view']);
 });