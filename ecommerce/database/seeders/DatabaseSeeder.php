<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
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
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Regular User
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        // Products
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'The ultimate iPhone.',
                'price' => 999.00,
                'stock' => 50,
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'Galaxy AI is here.',
                'price' => 899.99,
                'stock' => 45,
            ],
            [
                'name' => 'MacBook Air M3',
                'description' => 'Lean. Mean. M3 machine.',
                'price' => 1099.00,
                'stock' => 30,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Industry-leading noise canceling headphones.',
                'price' => 348.00,
                'stock' => 100,
            ],
            [
                'name' => 'PlayStation 5',
                'description' => 'Play Has No Limits.',
                'price' => 499.99,
                'stock' => 10,
            ],
             [
                'name' => 'Xbox Series X',
                'description' => 'Power Your Dreams.',
                'price' => 499.99,
                'stock' => 15,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
