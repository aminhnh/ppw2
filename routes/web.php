<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::post('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::get('/buku/search', [BukuController::class,'search'])->name('buku.search');

Route::delete('/buku/galeri/delete/{id}', [BukuController::class,'destroyGaleri'])->name('buku.destroy-galeri');


Route::get('/list-buku', [PublicViewController::class, 'showList'])->name('buku.list-buku');
Route::get('/list-buku-populer', [PublicViewController::class, 'showListPopuler'])->name('buku.list-buku-populer');
Route::get('/detail-buku/{id}', [PublicViewController::class, 'showDetail'])->name('buku.detail');
Route::post('/rate/book/{id}', [BukuController::class,'rate'])->name('rate.book');


Route::get('/buku/myFavourite', [BukuController::class, 'showFav'])->name('buku.fav');
Route::post('buku/add-favorite/{id}', [BukuController::class, 'addFav'])->name('buku.addfav');


Route::resource('categories', CategoryController::class);
Route::get('category/{category}', [BukuController::class,'getBooksByCategory'])->name('buku.by.category');

Route::post('/add-category/{buku}', [BukuController::class, 'addCategory'])->name('add.category');