<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function listar();
    public function buscar(int $Cod);
    public function excluir(int $Cod);
    public function inserir(array $model);
    public function alterar(array $form);
}
