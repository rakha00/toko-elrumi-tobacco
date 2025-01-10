<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::factory()->create([
            'name' => 'Grand Royal Samsu',
            'image' => 'grand-royal-samsu.png',
            'price' => 155000,
        ]);
        Product::factory()->create([
            'name' => 'Grand Royal Mild',
            'image' => 'grand-royal-mild.png',
            'price' => 130000,
        ]);
        Product::factory()->create([
            'name' => 'Busa Filter',
            'image' => 'busa-filter.jpg',
            'price' => 5000,
        ]);
        Product::factory()->create([
            'name' => 'Peralatan Linting',
            'image' => 'peralatan-linting.png',
            'price' => 15000,
        ]);
        Product::factory()->create([
            'name' => 'Tiga Putri Cap Jago',
            'image' => 'tiga-putri-cap-jago.png',
            'price' => 75000,
        ]);
        Product::factory()->create([
            'name' => 'Tiga Putri Cap Nona',
            'image' => 'tiga-putri-cap-nona.png',
            'price' => 45000,
        ]);
        Product::factory()->create([
            'name' => 'Kertas Papir',
            'image' => 'kertas-papir.png',
            'price' => 3000,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}