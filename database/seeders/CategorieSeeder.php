<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            'nom' => 'Vêtements',
            'description' => 'T-shirts, chemises, robes et plus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'nom' => 'Chaussures',
            'description' => 'Sneakers, mocassins, sandales et plus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'nom' => 'Accessoires',
            'description' => 'Sacs, ceintures, montres et plus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'nom' => 'Beauté',
            'description' => 'Crèmes, huiles, parfums et plus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
