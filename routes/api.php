<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas de livros
Route::get('/livros', ['App\Http\Controllers\LivroController', 'listar']);
Route::post('/livros', ['App\Http\Controllers\LivroController', 'inserir']);
Route::get('/livros/{Cod}', ['App\Http\Controllers\LivroController', 'buscar']);
Route::put('/livros/{Cod}/alterar', ['App\Http\Controllers\LivroController', 'alterar']);
Route::delete('/livros/{Cod}/excluir', ['App\Http\Controllers\LivroController', 'excluir']);

// Rotas de autores
Route::get('/autores', ['App\Http\Controllers\AutorController', 'listar']);
Route::get('/autores/todos', ['App\Http\Controllers\AutorController', 'todos']);
Route::post('/autores', ['App\Http\Controllers\AutorController', 'inserir']);
Route::get('/autores/{Cod}', ['App\Http\Controllers\AutorController', 'buscar']);
Route::put('/autores/{Cod}/alterar', ['App\Http\Controllers\AutorController', 'alterar']);
Route::delete('/autores/{Cod}/excluir', ['App\Http\Controllers\AutorController', 'excluir']);

// Rotas de assuntos
Route::get('/assuntos', ['App\Http\Controllers\AssuntoController', 'listar']);
Route::get('/assuntos/todos', ['App\Http\Controllers\AssuntoController', 'todos']);
Route::post('/assuntos', ['App\Http\Controllers\AssuntoController', 'inserir']);
Route::get('/assuntos/{Cod}', ['App\Http\Controllers\AssuntoController', 'buscar']);
Route::put('/assuntos/{Cod}/alterar', ['App\Http\Controllers\AssuntoController', 'alterar']);
Route::delete('/assuntos/{Cod}/excluir', ['App\Http\Controllers\AssuntoController', 'excluir']);

// Rota de relatório
Route::get('/relatorio', ['App\Http\Controllers\RelatorioController', 'listar']);
