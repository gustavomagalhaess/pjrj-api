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
        DB::statement("CREATE VIEW author_report AS (
                SELECT a.name,
                       COUNT(b.id) AS count
                  FROM authors a
            INNER JOIN author_book ab ON a.id = ab.author_id
            INNER JOIN books b ON ab.book_id = b.id
              GROUP BY a.name
              ORDER BY a.name
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS author_report");
    }
};
