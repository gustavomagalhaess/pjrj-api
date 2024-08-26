<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Assunto;
use App\Repositories\AssuntoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AssuntoService extends Service
{
    public function __construct(AssuntoRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Cria um novo livro.
     *
     * @param Request $request
     *
     * @return Livro
     */
    public function inserir(Request $request): Assunto
    {
        $assunto = $request->validate([
            'descricao' => 'required|max:20',
        ]);

        return $this->repository->inserir($assunto);
    }

    /**
     * Altera o livro.
     *
     * @param int     $Cod
     * @param Request $request
     *
     * @return Livro
     */
    public function alterar(int $Cod, Request $request): Assunto
    {
        $assunto = $request->validate([
            'descricao' => 'required|max:20',
        ]);

        return $this->repository->alterar(array_merge(['CodAs' => $Cod], $assunto));
    }

    /**
     * Listagem dos assuntos sem paginação.
     *
     * @return Collection
     */
    public function todos(): Collection
    {
        return $this->repository->todos();
    }
}
