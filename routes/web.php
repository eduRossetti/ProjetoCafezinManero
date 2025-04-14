<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// routes/web.php

use App\Http\Controllers\CoffeeController;

Route::get('/coffee', [CoffeeController::class, 'index'])->name('coffee.index');
Route::get('/coffee/create', [CoffeeController::class, 'create'])->name('coffee.create');
Route::post('/coffee/store', [CoffeeController::class, 'store'])->name('coffee.store');
Route::delete('coffee/{id}', [CoffeeController::class, 'destroy'])->name('coffee.destroy');
Route::get('coffee/{id}', [CoffeeController::class, 'edit'])->name('coffee.edit');
Route::put('coffee/update/{id}', [CoffeeController::class, 'update'])->name('coffee.update');
Route::post('coffee/', [CoffeeController::class, 'search'])->name('coffee.search');

use App\Http\Controllers\FornecedorController;

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');

use App\Http\Controllers\ClienteController;

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');