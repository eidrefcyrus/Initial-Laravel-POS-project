<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::updateOrCreate(
            ['email' => 'juan@example.com'],
            ['full_name' => 'Juan Dela Cruz', 'phone' => '09171234567']
        );

        Customer::updateOrCreate(
            ['email' => 'maria@example.com'],
            ['full_name' => 'Maria Santos', 'phone' => '09181234567']
        );

        Customer::updateOrCreate(
            ['email' => 'carlo@example.com'],
            ['full_name' => 'Carlo Reyes', 'phone' => '09191234567']
        );

        User::updateOrCreate(
            ['email' => 'admin@pos.test'],
            [
                'name' => 'System Administrator',
                'username' => 'admin',
                'full_name' => 'System Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'cashier@pos.test'],
            [
                'name' => 'Sample Cashier',
                'username' => 'cashier',
                'full_name' => 'Sample Cashier',
                'password' => Hash::make('password123'),
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Ballpen'],
            ['price' => 15.00, 'stock_quantity' => 50, 'image' => null]
        );

        Product::updateOrCreate(
            ['name' => 'Notebook'],
            ['price' => 45.00, 'stock_quantity' => 30, 'image' => null]
        );

        Product::updateOrCreate(
            ['name' => 'USB Flash Drive'],
            ['price' => 299.00, 'stock_quantity' => 15, 'image' => null]
        );
    }
}