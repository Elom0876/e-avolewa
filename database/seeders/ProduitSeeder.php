<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produits')->insert([
            'nom' => 'T-shirt',
            'description' => 'T-shirt en coton de qualité supérieure',
            'prix' => 5000,
            'stock' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produits')->insert([
            'nom' => 'Jean',
            'description' => 'Jean slim confortable et élégant',
            'prix' => 15000,
            'stock' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produits')->insert([
            'nom' => 'Chaussures',
            'description' => 'Chaussures en cuir très résistantes',
            'prix' => 20000,
            'stock' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
