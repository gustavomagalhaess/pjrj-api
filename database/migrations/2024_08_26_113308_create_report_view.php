<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW report AS (
                SELECT b.id,
                       b.title,
                       GROUP_CONCAT(DISTINCT a.name ORDER BY a.name SEPARATOR ', ') AS authors,
                       GROUP_CONCAT(DISTINCT s.description ORDER BY s.description SEPARATOR ', ') AS subjects,
                       b.edition,
                       b.publisher,
                       b.published_at
                  FROM books b
             LEFT JOIN author_book ab ON b.id = ab.book_id
             LEFT JOIN authors a ON ab.author_id = a.id
             LEFT JOIN book_subject bs ON b.id = bs.book_id
             LEFT JOIN subjects s ON bs.subject_id = s.id
              GROUP BY b.id,
                       b.title,
                       b.edition,
                       b.publisher,
                       b.published_at
              ORDER BY authors
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS report");
    }
};
