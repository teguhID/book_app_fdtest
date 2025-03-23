<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', function () {
        return view('dashboard');
    })->name('users');

    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

    Route::get('/books', [App\Http\Controllers\BooksController::class, 'index'])->name('books');
    Route::post('/books/add', [App\Http\Controllers\BooksController::class, 'add'])->name('books.add');
    Route::get('/books/detail/{id_books}', [App\Http\Controllers\BooksController::class, 'detail'])->name('books.detail');
    Route::post('/books/edit/{id_books}', [App\Http\Controllers\BooksController::class, 'edit'])->name('books.edit');
    Route::post('/books/delete/{id_books}', [App\Http\Controllers\BooksController::class, 'delete'])->name('books.delete');
});
