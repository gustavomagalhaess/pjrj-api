<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Autor;
use Illuminate\Support\Collection;

class AutorRepository extends Repository
{
    public function __construct(Autor $model)
    {
        parent::__construct($model);
    }

    /**
     * Cria um novo autor.
     *
     * @param array $model
     *
     * @return Autor
     */
    public function inserir(array $model): Autor
    {
        return $this->model::create([
            'Nome' => $model['nome'],
        ]);
    }

    /**
     * Altera o autor.
     *
     * @param array $form
     *
     * @return Autor
     */
    public function alterar(array $form): Autor
    {
        $autor = $this->model::find($form['CodAu']);

        $autor->Nome = $form['nome'];

        $autor->save();

        return $autor;
    }

    /**
     * Listagem dos autores sem paginação.
     *
     * @return Collection
     */
    public function todos(): Collection
    {
        return $this->model::all();
    }
}
