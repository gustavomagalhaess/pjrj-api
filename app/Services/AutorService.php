<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Autor;
use App\Repositories\AutorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AutorService extends Service
{
    public function __construct(AutorRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Cria um novo autor.
     *
     * @param Request $request
     *
     * @return Autor
     */
    public function inserir(Request $request): Autor
    {
        $autor = $request->validate([
            'nome' => 'required|max:40',
        ]);

        return $this->repository->inserir($autor);
    }

    /**
     * Altera o autor.
     *
     * @param int     $Cod
     * @param Request $request
     *
     * @return Autor
     */
    public function alterar(int $Cod, Request $request): Autor
    {
        $autor = $request->validate([
            'nome' => 'required|max:40',
        ]);

        return $this->repository->alterar(array_merge(['CodAu' => $Cod], $autor));
    }

    /**
     * Listagem dos autores sem paginação.
     *
     * @return Collection
     */
    public function todos(): Collection
    {
        return $this->repository->todos();
    }
}
