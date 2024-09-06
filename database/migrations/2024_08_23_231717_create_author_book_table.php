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
        Schema::create('author_book', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('book_id');

            $table->foreign('author_id', 'author_book_index_1')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('book_id', 'author_book_index_2')->references('id')->on('books')->onDelete('cascade');

            $table->unique(['author_id', 'book_id'], 'author_book_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
