<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'Livro';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'Codl';

    /**
     * A tabela não possui timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['Titulo', 'Editora', 'Edicao', 'AnoPublicacao'];

    /**
     * Autores do livro.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autores()
    {
        return $this->belongsToMany(
            Autor::class,
            'Livro_Autor',
            'Livro_Codl',
            'Autor_CodAu'
        );
    }

    /**
     * Assuntos do livro.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assuntos()
    {
        return $this->belongsToMany(
            Assunto::class,
            'Livro_Assunto',
            'Livro_Codl',
            'Assunto_CodAs',
        );
    }
}
