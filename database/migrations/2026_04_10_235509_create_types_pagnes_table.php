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
        Schema::create('types_pagnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Vlisco, Wax, Faux Vlisco...
            $table->string('description')->nullable();
            $table->string('origine')->nullable(); // Pays d'origine
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_pagnes');
    }
};
