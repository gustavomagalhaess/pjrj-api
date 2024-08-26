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
        DB::statement("CREATE VIEW Relatorio AS (
                SELECT li.Codl,
                       li.Titulo,
                       GROUP_CONCAT(DISTINCT a.Nome ORDER BY a.Nome SEPARATOR ', ') As Autor,
                       GROUP_CONCAT(DISTINCT ass.Descricao ORDER BY ass.Descricao SEPARATOR ', ') AS Assunto,
                       li.Edicao,
                       li.Editora,
                       li.AnoPublicacao
                  FROM Livro li
             LEFT JOIN Livro_Autor la ON li.Codl = la.Livro_Codl
             LEFT JOIN Autor a ON la.Autor_CodAu = a.CodAu
             LEFT JOIN Livro_Assunto las ON li.Codl = las.Livro_Codl
             LEFT JOIN Assunto ass ON las.Assunto_CodAs = ass.CodAs
              GROUP BY li.Codl,
                       li.Titulo,
                       li.Edicao,
                       li.Editora,
                       li.AnoPublicacao
              ORDER BY Autor
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS Relatorio");
    }
};
