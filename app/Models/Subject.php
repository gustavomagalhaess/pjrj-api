<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    /**
     * Subject's books.
     *
     * @return BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany(
            Book::class,
            'book_subject',
            'subject_id',
            'book_id'
        );
    }
}
