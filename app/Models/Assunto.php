<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'Assunto';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'CodAs';

    /**
     * A tabela não possui timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['Descricao'];

    /**
     * Livros sobre o assunto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function livros()
    {
        return $this->belongsToMany(
            Livro::class,
            'Livro_Assunto',
            'Assunto_CodAs',
            'Livro_Codl'
        );
    }
}
