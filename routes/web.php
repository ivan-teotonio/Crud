<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrotaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrotaController::class, 'importarcsv']);

Route::prefix('frotas')->group(function(){

Route::get('/', [FrotaController::class, 'index'])->name('frota.index');

Route::get('/create', [FrotaController::class, 'create'])->name('frota.create');

Route::post('/', [FrotaController::class, 'store'])->name('frota.store');

Route::get('/{id}/edit', [FrotaController::class, 'edit'])->where('id','[0-9]+')->name('frota.edit');

Route::put('/{id}', [FrotaController::class, 'update'])->where('id','[0-9]+')->name('frota.update');

Route::delete('/{id}', [FrotaController::class, 'destroy'])->where('id','[0-9]+')->name('frota.destroy');

});







