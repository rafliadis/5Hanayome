<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\StaffCastController;
use App\Http\Controllers\OnAirController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\GoodsController;

/*
|--------------------------------------------------------------------------
| Web Routes - TVアニメ「五等分の花嫁」
|--------------------------------------------------------------------------
| Routing arsitektur MPA Hybrid dengan controller & view terpisah
*/

// 1. Home (Hero 100vh)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. News (Berita & Informasi Terkini)
Route::get('/news', [NewsController::class, 'index'])->name('news');

// 3. Karakter (Daftar & Detail Karakter)
Route::get('/karakter', [CharacterController::class, 'index'])->name('karakter.index');
Route::get('/karakter/{slug}', [CharacterController::class, 'show'])->name('karakter.show');
Route::get('/character/{slug}', [CharacterController::class, 'show'])->name('character.show');

// 4. Staff & Cast (Staf Produksi & Pengisi Suara)
Route::get('/staff-cast', [StaffCastController::class, 'index'])->name('staff_cast');

// 5. On Air (Jadwal Tayang TV & Layanan Streaming)
Route::get('/on-air', [OnAirController::class, 'index'])->name('onair');
Route::get('/onair', [OnAirController::class, 'index']);

// 6. Music (Lagu Tema & Audio Jukebox)
Route::get('/music', [MusicController::class, 'index'])->name('music');

// 7. Goods (Merchandise Resmi & Toko)
Route::get('/goods', [GoodsController::class, 'index'])->name('goods');
