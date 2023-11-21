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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('businessEmail')->nullable();
            $table->string('title')->nullable();
            $table->string('companyName')->nullable();
            $table->string('companySize')->nullable();
            $table->string('country')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('message')->nullable();
            $table->string('consent')->nullable();
            $table->string('consent2')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
