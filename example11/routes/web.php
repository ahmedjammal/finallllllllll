<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//////////////////////////////////////     Product controller   /////////////////////

Route::get('/product-admin',[ProductController::class,'indexAdmin'])->name('product.indexAdmin');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/products/search', [ProductController::class, 'search']);

Route::get('user/products/inserttocard/{id}',[ProductController::class, 'inserttocard'])->name('product.inserttocard');
Route::delete('/product-admin/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
Route::get('/product-admin/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::put('/product-admin/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product-admin/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-admin/store',[ProductController::class,'store'])->name('product.store');
///////////////////////////////////////// admin



//////////////////////////////    Category Controller          ///////////////////////////////

Route::resource('category',CategoryController::class);

Auth::routes();

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/dashboard', function () {
    
    return view('dashboard');
});
Route::get('/profile', function () {
    
    return view('profile');
});

Route::resource('userorders',OrderController::class);