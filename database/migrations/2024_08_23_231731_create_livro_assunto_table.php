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
        Schema::create('Livro_Assunto', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Assunto_CodAs');

            $table->foreign('Livro_Codl', 'Livro_Assunto_FKIndex1')->references('Codl')->on('Livro')->onDelete('cascade');
            $table->foreign('Assunto_CodAs', 'Livro_Assunto_FKIntex2')->references('CodAs')->on('Assunto')->onDelete('cascade');

            $table->unique(['Livro_Codl', 'Assunto_CodAs'], 'Livro_Assunto_Unique_Index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Assunto');
    }
};
