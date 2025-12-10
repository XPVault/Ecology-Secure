<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TbUserController;



// GROUP ADMIN USER

Route::get('/admin/users/pdf', [TbUserController::class, 'generatePdf'])->name('users.pdf');
    Route::prefix('admin/users')->name('users.')->group(function () {
        Route::get('/', [TbUserController::class, 'index'])->name('index');
        Route::get('/create', [TbUserController::class, 'create'])->name('create');
        Route::post('/', [TbUserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TbUserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TbUserController::class, 'update'])->name('update');
        Route::delete('/{id}', [TbUserController::class, 'destroy'])->name('destroy');
    });


