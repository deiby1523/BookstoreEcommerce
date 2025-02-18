<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable(false);
            $table->text('product_description')->nullable();
            $table->double('product_price')->nullable(false);
            $table->integer('product_stock')->nullable(false);
            $table->integer('product_discount')->nullable()->default(0);
            $table->string('product_image_url',255)->nullable(false)->unique();
            $table->boolean('active')->nullable(false)->default(1);
            $table->unsignedBigInteger('subcategory_id')->nullable(false);
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('no action');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
