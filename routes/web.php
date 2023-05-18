<?php

use App\Models\TagihanPelanggan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PagePelangganController;
use App\Http\Controllers\PagePenggunaanController;
use App\Http\Controllers\TagihanPelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::get("/", function () {
    return view("beranda");
});

Route::middleware("guest")->group(function () {
    //login user
    Route::get("/login", [LoginController::class, "index"])->name("login");
    Route::post("/login", [LoginController::class, "authenticate"]);
    Route::get("/register", [RegisterController::class, "register"]);
    Route::post("/register", [RegisterController::class, "store"]);
});
Route::post("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::middleware(["auth"])->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard/home");
    });
    Route::resource("/admin/pelanggan", PagePelangganController::class);

    //penggunaan
    Route::resource("/admin/penggunaan", PagePenggunaanController::class);

    //tarif
    Route::resource("/admin/tarif", TarifController::class);
    //laporan
    Route::resource("/admin/laporan", LaporanController::class);


    //pembayaran pelanggan
    Route::resource("/admin/pembayaran", PembayaranController::class);
    //tagihan pelanggan
    Route::resource("/admin/tagihan", TagihanPelangganController::class);

    Route::get('/halaman/tagihan', function () {
        $tagihan = TagihanPelanggan::with('penggunaan', 'user')
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('halaman/tagihan/tagih', compact('tagihan'));
    });
});