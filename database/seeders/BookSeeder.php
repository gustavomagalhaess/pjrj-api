<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(20)->create();

        $books = Book::all();
        $authors = Author::all();
        $subjects = Subject::all();

        foreach ($books as $livro) {
            $rand = rand(1, 4);
            foreach ($authors->chunk($rand) as $authors_chunk) {
                $ids = $authors_chunk->pluck('id');
                $livro->authors()->sync($ids);
            }
            $rand = rand(1, 4);
            foreach ($subjects->chunk($rand) as $subjects_chunk) {
                $ids = $subjects_chunk->pluck('id');
                $livro->subjects()->sync($ids);
            }
        }
    }
}
