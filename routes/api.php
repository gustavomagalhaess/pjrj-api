<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas de books
Route::get('/books', ['App\Http\Controllers\BookController', 'list']);
Route::post('/books', ['App\Http\Controllers\BookController', 'store']);
Route::get('/books/{id}', ['App\Http\Controllers\BookController', 'find']);
Route::put('/books/{id}', ['App\Http\Controllers\BookController', 'update']);
Route::delete('/books/{id}', ['App\Http\Controllers\BookController', 'delete']);

// Rotas de authors
Route::get('/authors', ['App\Http\Controllers\AuthorController', 'list']);
Route::get('/authors/all', ['App\Http\Controllers\AuthorController', 'all']);
Route::post('/authors', ['App\Http\Controllers\AuthorController', 'store']);
Route::get('/authors/{id}', ['App\Http\Controllers\AuthorController', 'find']);
Route::put('/authors/{id}', ['App\Http\Controllers\AuthorController', 'update']);
Route::delete('/authors/{id}', ['App\Http\Controllers\AuthorController', 'delete']);

// Rotas de subjects
Route::get('/subjects', ['App\Http\Controllers\SubjectController', 'list']);
Route::get('/subjects/all', ['App\Http\Controllers\SubjectController', 'all']);
Route::post('/subjects', ['App\Http\Controllers\SubjectController', 'store']);
Route::get('/subjects/{id}', ['App\Http\Controllers\SubjectController', 'find']);
Route::put('/subjects/{id}', ['App\Http\Controllers\SubjectController', 'update']);
Route::delete('/subjects/{id}', ['App\Http\Controllers\SubjectController', 'delete']);

// Rota de relatório
Route::get('/reports', ['App\Http\Controllers\ReportController', 'list']);
Route::get('/reports/authors', ['App\Http\Controllers\ReportController', 'authors']);
Route::get('/reports/subjects', ['App\Http\Controllers\ReportController', 'subjects']);
