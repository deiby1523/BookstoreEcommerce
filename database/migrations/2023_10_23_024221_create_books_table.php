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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("book_isbn")->nullable(false);
            $table->string('book_title')->nullable(false);
            $table->unsignedBigInteger('author_id')->nullable(false);
            $table->unsignedBigInteger('publisher_id')->nullable(false);
            $table->unsignedBigInteger('subcategory_id')->nullable(false);
            $table->date('book_publication_date')->nullable(true);
            $table->string('book_description')->nullable(true);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('no action');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('no action');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
