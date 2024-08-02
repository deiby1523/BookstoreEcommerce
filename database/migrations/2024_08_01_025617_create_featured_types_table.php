<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('featured_types', function (Blueprint $table) {
            $table->id();
            $table->string('featured_type_name',60)->nullable(false);
            $table->text('featured_type_description')->nullable(true);
            $table->boolean('active')->nullable(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_types');
    }
};
