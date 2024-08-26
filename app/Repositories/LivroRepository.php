<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository extends Repository
{
    public function __construct(Livro $model)
    {
        parent::__construct($model);
    }

    /**
     * Cria um novo livro.
     *
     * @param array $livro
     *
     * @return Livro
     */
    public function inserir(array $model, ?array $autores = [], ?array $assuntos = []): Livro
    {
        $model = $this->model::create([
            'Titulo' => $model['titulo'],
            'Editora' => $model['editora'],
            'Edicao' => $model['edicao'],
            'AnoPublicacao' => $model['publicacao'],
        ]);

        if (! empty($autores)) {
            $model->autores()->sync($autores);
        }

        if (! empty($assuntos)) {
            $model->assuntos()->sync($assuntos);
        }

        return $model;
    }

    /**
     * Altera o livro.
     *
     * @param array $form
     *
     * @return Livro
     */
    public function alterar(array $form, ?array $autores = [], ?array $assuntos = []): Livro
    {
        $livro = $this->model::find($form['Codl']);

        $livro->Titulo = $form['titulo'];
        $livro->Editora = $form['editora'];
        $livro->Edicao = $form['edicao'];
        $livro->AnoPublicacao = $form['publicacao'];
        $livro->save();

        if (! empty($autores)) {
            $livro->autores()->sync($autores);
        }

        if (! empty($assuntos)) {
            $livro->assuntos()->sync($assuntos);
        }

        return $livro;
    }
}
