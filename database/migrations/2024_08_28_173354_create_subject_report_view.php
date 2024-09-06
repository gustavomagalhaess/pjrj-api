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
        DB::statement("CREATE VIEW subject_report AS (
                    SELECT s.description,
                           COUNT(b.id) AS count
                      FROM subjects s
                INNER JOIN book_subject bs ON s.id = bs.subject_id
                INNER JOIN books b ON bs.book_id = b.id
                  GROUP BY s.description
                  ORDER BY s.description
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS subject_report");
    }
};
