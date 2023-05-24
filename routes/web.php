<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Main
Route::get('/', [BaseController::class, 'homepage']);
Route::get('/search', [ProductController::class, 'searchPage']);

// Register
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

// Login
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// Profile
Route::get('/editProfile/{userID}', [UserController::class, 'editPage']);
Route::post('/editProfile/{userID}', [UserController::class, 'editedProfile']);

Route::get('/changePassword', [UserController::class, 'changePassPage']);
Route::post('/changePassword', [UserController::class, 'updatePass']);

// Product
Route::get('/showProduct', [ProductController::class, 'showProductPage']);
Route::get('/productDetail/{productID}', [ProductController::class, 'showProductDetailPage']);

Route::middleware('admin')->group(function() {
    //Update Item
    Route::get('/viewItem', [ProductController::class, 'manageItemPage']);
    Route::get('/updateItem/{itemId}', [ProductController::class, 'updateItemPage']);
    Route::post('/updateItem/{itemId}', [ProductController::class, 'updateItem']);
    
    //Add Item
    Route::get('/addItem', [ProductController::class, 'addItemPage']);
    Route::post('/addItem', [ProductController::class, 'addItem']);

    //Delete Item
    Route::delete('/deleteItem/{itemId}', [ProductController::class, 'deleteItem']);
});


//Transaction
Route::middleware('user')->group(function () {
    Route::get('/transactionHistory', [TransactionController::class, 'transactionHistoryPage']);
    Route::post('/checkout', [TransactionController::class, 'checkout']);
});


//Cart Items
Route::middleware('user')->group(function () {
    Route::get('/myCartItems', [cartController::class, 'cartPage']);
    Route::post('/addCart', [cartController::class, 'addCart']);
    Route::get('/updateCart/{cartID}', [cartController::class, 'updateCart']);
    Route::post('/updateCart', [cartController::class, 'update']);
    Route::delete('/myCartItems/{productID}', [cartController::class, 'removeProduct']);
});