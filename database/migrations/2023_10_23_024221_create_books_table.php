<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_isbn',20)->unique()->nullable(false);
            $table->string('book_title')->nullable(false)->unique();
            $table->unsignedBigInteger('author_id')->nullable(false);
            $table->unsignedBigInteger('publisher_id')->nullable(false);
            $table->unsignedBigInteger('subcategory_id')->nullable(false);
            $table->integer('book_number_pages')->nullable(false);
            $table->date('book_publication_date')->nullable();
            $table->text('book_description')->nullable();
            $table->string('book_image_url',255)->nullable(false)->unique();
            $table->double('book_price')->nullable(false);
            $table->integer('book_stock')->nullable(false);
            $table->integer('book_discount')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('no action');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('no action');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('no action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
