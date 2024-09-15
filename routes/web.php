<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Verification Routes
Route::post('/resetPasswordStore', [AuthController::class, 'resetPasswordStore'])->name('resetPasswordStore');
Route::get('/reset_password/{linkreset}', [AuthController::class, 'resetPasswordForm']);
Route::post('/verify_email', [AuthController::class, 'verifyEmail']);
Route::post('/verify_otp', [AuthController::class, 'verifyOTP']);
Route::get('/verification/{userId}', [AuthController::class, 'verification']);

// Product Routes
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/addcategories', [CategoriesController::class, 'addcategories'])->name('addcategories');
Route::post('/categoriesstore', [CategoriesController::class, 'store'])->name('categoriesstore');
Route::get('/editcategories/{id}', [CategoriesController::class, 'edit'])->name('editcategories');
Route::post('/updatecategories', [CategoriesController::class, 'update'])->name('updatecategories');
Route::get('/deletecategories/{id}', [CategoriesController::class, 'delete'])->name('deletecategories');

// Product Routes
Route::get('/addproduct', [ProductController::class, 'index'])->name('addproduct');
Route::get('/products/{page}', [HomeController::class, 'products']);
Route::get('/products/search/{name}', [HomeController::class, 'productsname']);
Route::post('/productstore', [ProductController::class, 'store'])->name('productstore');
Route::get('singleproduct/{id}', [ProductController::class, 'singleproduct'])->name('singleproduct');
Route::post('/submitcomment', [ProductController::class, 'submitComment']);
Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
Route::post('/updateproduct', [ProductController::class, 'update'])->name('updateproduct');
Route::get('/deleteproduct/{id}', [ProductController::class, 'delete'])->name('deleteproduct');

// Account Routes
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::get('/account/{username}', [AccountController::class, 'accountusername'])->name('accountusername');
Route::post('/update-profile', [AccountController::class, 'updateProfile'])->name('update.profile');
Route::post('/upload-profile-pic', [AccountController::class, 'uploadProfilePic'])->name('upload.profile.pic');

// Auth Routes
Route::get('/lupa_password', [AuthController::class, 'lupaPassword'])->name('lupaPassword');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logindatabase', [AuthController::class, 'login'])->name('logindatabase');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/registerdatabase', [AuthController::class, 'register'])->name('registerdatabase');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
