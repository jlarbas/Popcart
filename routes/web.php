<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\InventoryTicketController;

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

//Restaurants
Route::get('/', [RestaurantController::class,'index'])->name('home')->middleware('auth');
//Route::get('/index/{restaurant}',[RestaurantController::class,'show'])->name('restaurants');
Route::resource('restaurants',RestaurantController::class)->middleware('auth');
Route::get('restaurants/{restaurant:id}/products', [RestaurantController::class, 'products'])->middleware('auth');

//Users
Route::get('/users', [UserController::class,'index'])->name('usersindex')->middleware('auth');
Route::get('/users/{user}',[UserController::class,'show'])->name('showuser')->middleware('auth');
Route::get('/register',[UserController::class,'create'])->name('register');
Route::post('/users',[UserController::class,'store'])->name('createuser');
Route::put('/users/{user}',[UserController::class,'update'])->name('updateuser')->middleware('auth');
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('edituser')->middleware('auth');

//Products
Route::resource('products',ProductController::class);

//Cart
Route::get('/restaurants/{restaurant:id}/pos',[CartController::class,'index'])->name('pos')->middleware('auth');




//Orders
Route::get('/restaurants/{restaurant:id}/orders',[OrderController::class,'index'])->name('orders')->middleware('auth');
Route::get('/restaurants/orders/{order:id}/show',[OrderController::class,'show'])->name('displayOrder')->middleware('auth');

//Inventory

Route::get('restaurants/{restaurant:id}/inventory', [InventoryController::class, 'index'])->name('inventory')->middleware('auth');
Route::get('restaurants/{inventory:id}/show', [InventoryController::class, 'show'])->name('displayInventory')->middleware('auth');
Route::get('/inventory',[InventoryTicketController::class,'createList'])->name('createInventory')->middleware('auth');
Route::get('/inventory/submit',[InventoryTicketController::class,'submitList'])->name('inventoryTicket')->middleware('auth');


//Authentication
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/logout',[UserController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/users/authenticate',[UserController::class,'authenticate'])->name('authenticate');


