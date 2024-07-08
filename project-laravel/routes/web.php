<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\HomeController;
use App\Models\Product;

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

route::get('/home', [ProductUserController::class, 'home'])-> name('user.index');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'postLogin']);

Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'postRegister'])->name('register');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::resource('category', CategoryController::class);

    //Profuct
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');

    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/admin/product/search', [ProductController::class, 'search'])->name('product.search');


    //Blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

    Route::get('/add-blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/add-blog', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::get('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    Route::get('/admin/blog/search', [BlogController::class, 'search'])->name('blog.search');

    //Category
    Route::get('/cat', [CatController::class, 'index'])->name('cat.index');

    Route::get('/add-cat', [CatController::class, 'create'])->name('cat.create');
    Route::post('/add-cat', [CatController::class, 'store'])->name('cat.store');

    Route::get('/edit-cat/{id}', [CatController::class, 'edit'])->name('cat.edit');
    Route::put('/update-cat/{id}', [CatController::class, 'update'])->name('cat.update');

    Route::get('/delete-cat/{id}', [CatController::class, 'destroy'])->name('cat.delete');

    Route::get('/admin/cat/search', [CatController::class, 'search'])->name('cat.search');
});



// Route::get('/home',function(){
//     return view('user/home');
// });

Route::get('/home', [ProductUserController::class, 'showHomePage']);
Route::resource('product1', ProductUserController::class); 
Route::resource('blog1', ProductUserController::class); 

Route::get('/product',function(){
    return view('user/product');
});

Route::get('/blog',function(){
    return view('user/blog');
});

Route::get('/product/{MaSP}', [ProductUserController::class, 'showCt']);