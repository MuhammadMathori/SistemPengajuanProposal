<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('proposal', ProposalController::class);
    Route::post('dosen/import', [DosenController::class, 'import'])->name('dosen.import');
    Route::get('approve/{id}', [App\Http\Controllers\ProposalController::class, 'approve'])->name('proposal.approve');
    Route::get('reject/{id}', [App\Http\Controllers\ProposalController::class, 'reject'])->name('proposal.reject');
});

Route::get('/', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return redirect()->route('dashboard');
});


Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
