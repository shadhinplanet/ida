<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CashInController;
use App\Http\Controllers\backend\LoanController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/clear', function () {
    Artisan::call('optimize:clear');

    return redirect()->route('home');
});


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Cash in
    Route::get('/cash-ins', [CashInController::class, 'index'])->name('cashin.index');
    Route::delete('/cash-ins/delete/{id}', [CashInController::class, 'delete'])->name('cashin.delete');

    // Loan
    Route::resource('loan', LoanController::class);


});


require __DIR__.'/auth.php';
