<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PessoasController;

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

Route::prefix('produtos')->group(function () {
   
    Route::get('/', [ProdutosController::class, 'index']);
    Route::get('/retornaProximoId', [ProdutosController::class, 'retornaProximoId']);
    Route::get('/id/{id}', [ProdutosController::class, 'buscarProdutoPeloId']);
    Route::get('/codigo/{codigo}', [ProdutosController::class, 'buscarProdutoPeloCodigo']);
   
    Route::post('/', [ProdutosController::class, 'CadastrarProduto']);
    Route::put('/{id}', [ProdutosController::class, 'AlteraProduto']);
});

Route::prefix('pessoas')->group(function () {
   
    Route::get('/', [PessoasController::class, 'index']);
    Route::get('/retornaProximoId', [PessoasController::class, 'retornaProximoId']);
    Route::get('/id/{id}', [PessoasController::class, 'buscarPessoaPeloId']);
   
    Route::post('/', [PessoasController::class, 'CadastrarPessoa']);
    Route::put('/{id}', [PessoasController::class, 'AlteraPessoa']);
});
