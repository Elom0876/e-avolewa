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
        Schema::table('produits', function (Blueprint $table) {
            $table->foreignId('type_pagne_id')->nullable()->constrained('types_pagnes')->onDelete('set null');
            $table->string('couleur')->nullable();
            $table->string('longueur')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['type_pagne_id']);
            $table->dropColumn('type_pagne_id');
            $table->dropColumn('couleur');
            $table->dropColumn('longueur');
        });
    }
};
