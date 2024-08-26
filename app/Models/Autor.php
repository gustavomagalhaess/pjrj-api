<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'Autor';

    /**
     * A chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'CodAu';

    /**
     * A tabela não possui timestamps.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['Nome'];

    /**
     * Livros do autor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function livros()
    {
        return $this->belongsToMany(
            Livro::class,
            'Livro_Autor',
            'Autor_CodAu',
            'Livro_Codl'
        );
    }
}
