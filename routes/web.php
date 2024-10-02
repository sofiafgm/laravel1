<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // API
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/member', [MemberController::class, 'create'])->name('member.create');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('/member/{id}', [MemberController::class, 'delete'])->name('member.delete');

    Route::get('/statistics', [StatisticsController::class, 'barChart'])->name('statistics.createBar');
});

require __DIR__.'/auth.php';
