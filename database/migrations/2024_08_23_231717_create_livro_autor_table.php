<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Livro_Autor', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Autor_CodAu');

            $table->foreign('Livro_Codl', 'Livro_Autor_FKIndex1')->references('Codl')->on('Livro')->onDelete('cascade');
            $table->foreign('Autor_CodAu', 'Livro_Autor_FKIndex2')->references('CodAu')->on('Autor')->onDelete('cascade');

            $table->unique(['Livro_Codl', 'Autor_CodAu'], 'Livro_Autor_Unique_Index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Autor');
    }
};
