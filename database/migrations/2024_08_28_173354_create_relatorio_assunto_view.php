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
        DB::statement("CREATE VIEW Relatorio_Assunto AS (
                    SELECT ass.Descricao,
                           COUNT(li.Codl) AS Qde
                      FROM Assunto ass
                INNER JOIN Livro_Assunto las ON ass.CodAs = las.Assunto_CodAs
                INNER JOIN Livro li ON las.Livro_Codl = li.Codl
                  GROUP BY ass.Descricao
                  ORDER BY ass.Descricao
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS Relatorio_Assunto");
    }
};
