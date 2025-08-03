<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PengajuanKiaController; 
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\StatusKiaController;
use App\Http\Controllers\AktaStatisticController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengajuan-kia', [PengajuanKiaController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan-kia', [PengajuanKiaController::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan-kia/form', function () {
    return view('pengajuan_kia.form');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Admin Routes
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function () {
    $credentials = request()->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        // Check if user is admin (you can add admin check logic here)
        return redirect()->intended('/admin');
    }
    
    return back()->withErrors([
        'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
    ]);
})->name('admin.login.post');

Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');
Route::get('/admin/laporan-akta-kelahiran', [AdminDashboardController::class, 'laporanAktaKelahiran'])->middleware(['auth'])->name('admin.laporan.akta.kelahiran');
Route::get('/admin/laporan-akta-kematian', [AdminDashboardController::class, 'laporanAktaKematian'])->middleware(['auth'])->name('admin.laporan.akta.kematian');
Route::get('/admin/e-akta', [AktaStatisticController::class, 'sistemEAkta'])->middleware(['auth'])->name('admin.e-akta');
Route::post('/admin/e-akta/tambah-pemohon', [AktaStatisticController::class, 'tambahPemohon'])->middleware(['auth'])->name('admin.e-akta.tambah-pemohon');

// Statistik Akta Routes
Route::get('/admin/statistics', [AktaStatisticController::class, 'index'])->middleware(['auth'])->name('admin.statistics');
Route::post('/admin/statistics/update', [AktaStatisticController::class, 'updateStatistic'])->middleware(['auth'])->name('admin.statistics.update');
Route::post('/admin/statistics/reset-monthly', [AktaStatisticController::class, 'resetMonthly'])->middleware(['auth'])->name('admin.statistics.reset.monthly');
Route::post('/admin/statistics/reset-yearly', [AktaStatisticController::class, 'resetYearly'])->middleware(['auth'])->name('admin.statistics.reset.yearly');
Route::get('/api/statistics', [AktaStatisticController::class, 'apiStatistics'])->name('api.statistics');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/admin/login');
})->name('logout');
Route::get('/status-kia', [StatusKiaController::class, 'index'])->name('status.kia');
Route::post('/status-kia', [StatusKiaController::class, 'check'])->name('status.check');
Route::get('/pengajuan-online', [PengajuanKiaController::class, 'create']);
Route::get('/pengajuan-kia/form', [PengajuanKiaController::class, 'form'])->name('pengajuan.form');
Route::post('/pengajuan-online', [PengajuanKiaController::class, 'store'])->name('pengajuan-online.store');

require __DIR__.'/auth.php';
