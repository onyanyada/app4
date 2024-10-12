<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController; //Add
use App\Models\Book; //Add



// Route::get('/', [BookController::class, 'index'])->middleware(['auth'])->name('book_index');
Route::get('/', [BookController::class, 'index'])->name('book_index');


Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
Route::group(
    ['middleware' => 'auth'],
    function () {
        //本：追加 
        Route::post('/books', [BookController::class, "store"])->name('book_store');

        //本：削除 
        Route::delete('/book/{book}', [BookController::class, "destroy"])->name('book_destroy');

        //本：更新画面
        Route::post('/booksedit/{book}', [BookController::class, "edit"])->name('book_edit'); //通常
        Route::get('/booksedit/{book}', [BookController::class, "edit"])->name('edit');      //Validationエラーありの場合

        //本：更新画面
        Route::post('/books/update', [BookController::class, "update"])->name('book_update');
    }
);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
