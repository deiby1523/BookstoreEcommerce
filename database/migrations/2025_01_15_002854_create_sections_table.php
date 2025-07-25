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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name',100)->nullable(false);
            $table->boolean('section_use_custom_code')->nullable(false)->default(0);
            $table->text('section_custom_code')->nullable();
            $table->string('section_main_title')->nullable();
            $table->string('section_secondary_title')->nullable();
            $table->string('section_sub_title')->nullable();
            $table->string('section_secondary_sub_title')->nullable();
            $table->text('section_text_1')->nullable();
            $table->text('section_text_2')->nullable();
            $table->integer('section_color')->nullable()->default(1);
            $table->string('section_image_1_url',255)->nullable();
            $table->string('section_image_2_url',255)->nullable();
            $table->string('section_btn_link',255)->nullable();
            $table->integer('section_style')->nullable()->default(1);
            $table->boolean('active')->nullable(false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
