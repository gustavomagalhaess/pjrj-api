<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface ControllerInterface
{
    public function listar();
    public function buscar(int $Cod);
    public function inserir(Request $request);
    public function alterar(int $Cod, Request $request);
    public function excluir(int $Cod);
}
