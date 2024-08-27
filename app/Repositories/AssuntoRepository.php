<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Assunto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
     * @throws SaveException
     */
    public function inserir(array $model): Assunto
    {
        try {
            DB::beginTransaction();

            $assunto = Assunto::create([
                'Descricao' => $model['descricao'],
            ]);

            DB::commit();

            return $assunto;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * Altera o assunto.
     *
     * @param array $form
     *
     * @return Assunto
     * @throws SaveException
     */
    public function alterar(array $form): Assunto
    {
        try {
            DB::beginTransaction();

            $assunto = assunto::find($form['CodAs']);
            $assunto->Descricao = $form['descricao'];
            $assunto->save();

            DB::commit();

            return $assunto;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
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
