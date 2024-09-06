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
        Schema::create('book_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('subject_id');

            $table->foreign('book_id', 'book_subject_index_1')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('subject_id', 'book_subject_index_2')->references('id')->on('subjects')->onDelete('cascade');

            $table->unique(['book_id', 'subject_id'], 'book_subject_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_subject');
    }
};
