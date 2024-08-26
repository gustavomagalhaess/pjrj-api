<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Livro;
use App\Repositories\LivroRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LivroService extends Service
{
    public function __construct(LivroRepository $repository)
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
    public function inserir(Request $request): Livro
    {
        $autores = [];
        $assuntos = [];

        $livro = $request->validate([
            'titulo' => 'required|max:40',
            'editora' => 'required|max:40',
            'edicao' => 'required',
            'publicacao' => 'required|digits:4',
        ]);

        if (! empty($request->get('autores'))) {
            $autores = Arr::pluck($request->get('autores'), 'CodAu');
        }

        if (! empty($request->get('assuntos'))) {
            $assuntos = Arr::pluck($request->get('assuntos'), 'CodAs');
        }

        return $this->repository->inserir($livro, $autores, $assuntos);
    }

    /**
     * Altera o livro.
     *
     * @param int     $Cod
     * @param Request $request
     *
     * @return Livro
     */
    public function alterar(int $Cod, Request $request): Livro
    {
        $autores = [];

        $livro = $request->validate([
            'titulo' => 'required|max:40',
            'editora' => 'required|max:40',
            'edicao' => 'required',
            'publicacao' => 'required|digits:4',
        ]);

        if (! empty($request->get('autores'))) {
            $autores = Arr::pluck($request->get('autores'), 'CodAu');
        }

        if (! empty($request->get('assuntos'))) {
            $assuntos = Arr::pluck($request->get('assuntos'), 'CodAs');
        }

        return $this->repository->alterar(array_merge(['Codl' => $Cod], $livro), $autores, $assuntos);
    }
}
