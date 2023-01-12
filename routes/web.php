<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocietyController;
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
    return view('landing', ['title' => 'Societies Information System', 'p' => 'Check Information Society Now!', 'b' => 'Welcome Back!']);
});



Route::get('/register', [AdminController::class, 'register']);
Route::post('/register', [AdminController::class, 'postRegister']);

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'postLogin']);

Route::get('/logout', [AdminController::class, 'logout'])->middleware('must-login');


Route::middleware('must-login')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::prefix('societies')->group(function () {
            Route::get('/', [SocietyController::class, 'index']);
            Route::get('/export-csv', [SocietyController::class, 'exportCsv']);
            Route::post('/import-csv', [SocietyController::class, 'importCsv'])->middleware('user');
            Route::get('/export-pdf', [SocietyController::class, 'exportPdf']);
            Route::get('/create', [SocietyController::class, 'create'])->middleware('user');
            Route::post('/create', [SocietyController::class, 'store']);
            Route::get('/{id}', [SocietyController::class, 'show']);
            Route::get('/edit/{id}', [SocietyController::class, 'edit'])->middleware('user');
            Route::post('/edit/{id}', [SocietyController::class, 'update']);
            Route::get('/delete/{id}', [SocietyController::class, 'destroy'])->middleware('user');
        });
    });
});
