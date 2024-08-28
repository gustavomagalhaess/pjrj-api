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
        DB::statement("CREATE VIEW Relatorio_Autor AS (
                SELECT au.Nome,
                       COUNT(li.Codl) AS Qde
                  FROM Autor au
            INNER JOIN Livro_Autor la ON au.CodAu = la.Autor_CodAu
            INNER JOIN Livro li ON la.Livro_Codl = li.Codl
              GROUP BY au.Nome
              ORDER BY au.Nome
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS Relatorio_Autor");
    }
};
