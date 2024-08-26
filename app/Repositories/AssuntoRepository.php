<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Assunto;
use Illuminate\Support\Collection;

class AssuntoRepository extends Repository
{
    public function __construct(Assunto $model)
    {
        parent::__construct($model);
    }

    /**
     * Cria um novo assunto.
     *
     * @param array $model
     *
     * @return Assunto
     */
    public function inserir(array $model): Assunto
    {
        return Assunto::create([
            'Descricao' => $model['descricao'],
        ]);
    }

    /**
     * Altera o assunto.
     *
     * @param array $form
     *
     * @return Assunto
     */
    public function alterar(array $form): Assunto
    {
        $assunto = assunto::find($form['CodAs']);

        $assunto->Descricao = $form['descricao'];

        $assunto->save();

        return $assunto;
    }

    /**
     * Listagem dos assuntos sem paginação.
     *
     * @return Collection
     */
    public function todos(): Collection
    {
        return $this->model::all();
    }
}
