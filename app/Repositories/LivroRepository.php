<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;


class LivroRepository extends Repository
{
    public function __construct(Livro $model)
    {
        parent::__construct($model);
    }

    /**
     * Cria um novo livro.
     *
     * @param array      $model
     * @param null|array $autores
     * @param null|array $assuntos
     *
     * @return Livro
     * @throws SaveException
     */
    public function inserir(array $model, ?array $autores = [], ?array $assuntos = []): Livro
    {
        try {
            DB::beginTransaction();

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

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }


        return $model;
    }

    /**
     * Altera o livro.
     *
     * @param array      $form
     * @param null|array $autores
     * @param null|array $assuntos
     *
     * @return Livro
     * @throws SaveException
     */
    public function alterar(array $form, ?array $autores = [], ?array $assuntos = []): Livro
    {
        try {
            DB::beginTransaction();

            $livro = $this->model::find($form['Codl']);

            $livro->Titulo = $form['titulo'];
            $livro->Editora = $form['editora'];
            $livro->Edicao = $form['edicao'];
            $livro->AnoPublicacao = $form['publicacao'];
            $livro->save();

            if (!empty($autores)) {
                $livro->autores()->sync($autores);
            }

            if (!empty($assuntos)) {
                $livro->assuntos()->sync($assuntos);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }

        return $livro;
    }
}
