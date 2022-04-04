<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\General\General;
use App\Http\Controllers\Users\General as UsersGeneral;
use App\Http\Controllers\Customers\General as CustomersGeneral;
use App\Http\Controllers\Categories\General as CategoriesGeneral;
use App\Http\Controllers\Games\General as GamesGeneral;
use App\Http\Controllers\Blog\General as BlogGeneral;
use App\Http\Controllers\Sales\General as SalesGeneral;
use App\Http\Controllers\Orders\General as OrdersGeneral;

Route::middleware('isLogin')->group(function() {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login_post'])->name('login_post');
});

Route::middleware('isLogout')->group(function() {
    Route::get('/', [General::class, 'index'])->name('index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Users
    Route::prefix('users')->group(function() {
        Route::get('/profile', [UsersGeneral::class, 'getProfile'])->name('getProfile');
        Route::post('/profile', [UsersGeneral::class, 'editProfile'])->name('editProfile');
        Route::get('/list', [UsersGeneral::class, 'getUsersList'])->name('getUsersList');
        Route::post('/add', [UsersGeneral::class, 'addUser'])->name('addUser');
        Route::post('/view', [UsersGeneral::class, 'viewUser']);
        Route::post('/email-check', [UsersGeneral::class, 'checkUserEmail']);
        Route::post('/edit', [UsersGeneral::class, 'editUser'])->name('editUser');
    });

    // Customers
    Route::prefix('customers')->group(function() {
        Route::get('/list', [CustomersGeneral::class, 'getCustomersList'])->name('getCustomersList');
        Route::post('/add', [CustomersGeneral::class, 'addCustomer'])->name('addCustomer');
        Route::post('/view', [CustomersGeneral::class, 'viewCustomer']);
        Route::post('/edit', [CustomersGeneral::class, 'editCustomer'])->name('editCustomer');
    });

    // Categories
    Route::prefix('categories')->group(function() {
        Route::get('/list', [CategoriesGeneral::class, 'getCategoriesList'])->name('getCategoriesList');
        Route::post('/category-add', [CategoriesGeneral::class, 'addCategory'])->name('addCategory');
        Route::post('/subcategory-add', [CategoriesGeneral::class, 'addSubcategory'])->name('addSubcategory');
        Route::post('/view', [CategoriesGeneral::class, 'viewCategory']);
        Route::post('/edit', [CategoriesGeneral::class, 'editCategory'])->name('editCategory');
    });

    // Games
    Route::prefix('games')->group(function() {
        Route::get('/list', [GamesGeneral::class, 'getGamesList'])->name('getGamesList');
        Route::get('/add', [GamesGeneral::class, 'newGame'])->name('newGame');
        Route::post('/add', [GamesGeneral::class, 'addGame'])->name('addGame');
        Route::get('/edit/{id}', [GamesGeneral::class, 'getGame'])->name('getGame');
        Route::post('/edit', [GamesGeneral::class, 'editGame'])->name('editGame');
        Route::post('/subcategories', [GamesGeneral::class, 'getSubcategories']);
    });

    // Blog
    Route::prefix('blog')->group(function() {
        Route::get('/all-posts', [BlogGeneral::class, 'getAllPosts'])->name('getAllPosts');
        Route::get('/add', [BlogGeneral::class, 'newPost'])->name('newPost');
        Route::post('/add', [BlogGeneral::class, 'addPost'])->name('addPost');
        Route::get('/edit/{id}', [BlogGeneral::class, 'getPost'])->name('getPost');
        Route::post('/edit', [BlogGeneral::class, 'editPost'])->name('editPost');
        Route::get('/view/{slug}', [BlogGeneral::class, 'viewPost'])->name('viewPost');
    });

    // Sales
    Route::prefix('sales')->group(function() {
        Route::get('/list', [SalesGeneral::class, 'getSalesList'])->name('getSalesList');
        Route::post('/add', [SalesGeneral::class, 'addSale'])->name('addSale');
        Route::post('/view', [SalesGeneral::class, 'viewSale']);
        Route::post('/edit', [SalesGeneral::class, 'editSale'])->name('editSale');
    });

    // Orders
    Route::prefix('orders')->group(function() {
        Route::get('/list', [OrdersGeneral::class, 'getOrdersList'])->name('getOrdersList');
        Route::get('/products/{id}', [OrdersGeneral::class, 'viewProducts'])->name('viewProducts');
    });
});
