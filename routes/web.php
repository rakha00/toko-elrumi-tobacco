<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/riwayat-pemesanan', function () {
    return view('riwayat-pemesanan');
})->middleware(['auth', 'verified'])->name('riwayat-pemesanan');

Route::post('/midtrans/pending', [MidtransController::class, 'onPending'])->name('midtrans.pending');
Route::post('/midtrans/success', [MidtransController::class, 'onSuccess'])->name('midtrans.success');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// TEST GITHUB

require __DIR__ . '/auth.php';
