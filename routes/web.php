<?php

use App\Http\Controllers\ProductController;
use App\Models\Products;
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

//disini menginisiasi / memanggil sebuah controller ProductController beserta fungsi - fungsi yang ada didalamnya
//sedangkan route memiliki fungsi tersendiri untuk eksekusi sebuah halaman tertentu,fungsi tersebut seperti get,patch,delete,post dll
//setelah membuat route baru,maka kita harus merefresh route tersebut dengan perintah php artisan optimize
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/create/store', [ProductController::class,'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('products/edit/update/{id}', [ProductController::class,'update'])->name('products.update');
Route::delete('/products/delete/{id}', [ProductController::class,'destroy'])->name('products.destroy');

Route::post('/products/postmandummy', [ProductController::class,'postmanstore']);