<?php

use Illuminate\Support\Facades\Route;

// Route tanpa prefix untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route group untuk user dengan prefix 'user'
Route::prefix('user')->group(function () {
    // Dashboard User
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    
    // Halaman Pemberitahuan
    Route::get('/pemberitahuan', function () {
        return view('user.pemberitahuan');
    })->name('user.pemberitahuan');
    
    // Halaman Jadwal - PERBAIKAN DI SINI
    Route::get('/jadwal', function () {
        return view('user.jadwal');
    })->name('user.jadwal');
    
    // Halaman Laporan
    Route::get('/laporan', function () {
        return view('user.laporan');
    })->name('user.laporan');
});