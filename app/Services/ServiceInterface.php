<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ServiceInterface
{
    public function listar();
    public function buscar(int $Cod);
    public function excluir(int $Cod);
    public function inserir(Request $request);
    public function alterar(int $Cod, Request $request);
}
