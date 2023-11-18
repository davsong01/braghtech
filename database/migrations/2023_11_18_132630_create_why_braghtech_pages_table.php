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
        Schema::create('why_braghtech_pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_image')->nullable();
            $table->string('header_title')->nullable();
            $table->string('header_description')->nullable();
            $table->string('header_button_text')->nullable();
            $table->string('header_button_status')->nullable();
            $table->string('header_button_link')->nullable();

            $table->text('who_are_we_text')->nullable();
            $table->string('who_are_we_image')->nullable();
            $table->string('who_are_we_status')->nullable();

            $table->text('our_mission_text')->nullable();
            $table->string('our_mission_status')->nullable();

            $table->text('our_vision_text')->nullable();
            $table->string('our_vision_image')->nullable();
            $table->string('our_vision_status')->nullable();

            $table->text('why_choose_us_text')->nullable();
            $table->text('why_choose_us_image')->nullable();
            $table->string('why_choose_us_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_braghtech_pages');
    }
};
