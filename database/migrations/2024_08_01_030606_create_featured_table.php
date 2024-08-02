<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('featured', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable(false);
            $table->unsignedBigInteger('type_id')->nullable(false);
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('featured_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured');
    }
};
