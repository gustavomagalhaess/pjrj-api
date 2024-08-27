<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Autor;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
     * @throws SaveException
     */
    public function inserir(array $model): Autor
    {
        try {
            DB::beginTransaction();

            $autor = $this->model::create([
                'Nome' => $model['nome'],
            ]);

            DB::commit();

            return $autor;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * Altera o autor.
     *
     * @param array $form
     *
     * @return Autor
     * @throws SaveException
     */
    public function alterar(array $form): Autor
    {
        try {
            DB::beginTransaction();

            $autor = $this->model::find($form['CodAu']);

            $autor->Nome = $form['nome'];
            $autor->save();

            DB::commit();

            return $autor;

        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
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
