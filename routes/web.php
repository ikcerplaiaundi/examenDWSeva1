<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
/*añadido */
use App\Http\Middleware\AfterMiddleware;
use App\Http\Controllers\ManzanaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //CRUD MANZANAS
    Route::post('/guardar', [ManzanaController::class, 'store']);
    //metodo index() tambien funciona, indexMine lista pero ordenado, es lo mismo
    Route::get('/dashboard', [ManzanaController::class, 'indexMine'])->name('dashboard');
    Route::post('/update', [ManzanaController::class, 'update'])->name('update');
    Route::delete('/delete/{manzana}', [ManzanaController::class, 'destroy'])->name('delete')->middleware([AfterMiddleware::class]);;
});

require __DIR__.'/auth.php';
