<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('catalog', [Controllers\CatalogController::class, 'getIndex'])->name('catalog.index');
Route::get('catalog/{catalog}', [Controllers\CatalogController::class, 'getOne'])->name('catalog.one');
Route::get('product/{product}', [Controllers\ProductController::class, 'getIndex'])->name('product.index'); // @asset()
Route::get('maintext/api',[Controllers\Api\MainTextApiController::class,'index']);

Route::get('{url?}',[Controllers\BaseController::class,'getIndex']); //всегда в конце
