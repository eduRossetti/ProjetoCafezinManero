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
Route::post('coffee/search', [CoffeeController::class, 'search'])->name('coffee.search');

use App\Http\Controllers\FornecedorController;

Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');
Route::get('/fornecedores/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
Route::post('/fornecedores/store', [FornecedorController::class, 'store'])->name('fornecedores.store');
Route::delete('/fornecedores/{id}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');
Route::get('/fornecedores/{id}', [FornecedorController::class, 'edit'])->name('fornecedores.edit');
Route::put('/fornecedores/update/{id}', [FornecedorController::class, 'update'])->name('fornecedores.update');
Route::post('/fornecedores/search', [FornecedorController::class, 'search'])->name('fornecedores.search');

use App\Http\Controllers\ClienteController;

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::post('/clientes/search', [ClienteController::class, 'search'])->name('clientes.search');


