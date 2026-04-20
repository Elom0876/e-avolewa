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
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn('genre');
        });

        Schema::table('modeles', function (Blueprint $table) {
            $table->enum('genre', [
                'homme',
                'femme',
                'garcon',
                'fille'
            ])->default('homme');
        });
    }

    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn('genre');
        });

        Schema::table('modeles', function (Blueprint $table) {
            $table->string('genre')->default('homme');
        });
    }
};
