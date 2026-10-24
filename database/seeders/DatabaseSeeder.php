<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::insert([
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'phone' => '09171234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Maria Santos', 'email' => 'maria@example.com', 'phone' => '09181234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Carlo Reyes', 'email' => 'carlo@example.com', 'phone' => '09191234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Anna Garcia', 'email' => 'anna@example.com', 'phone' => '09201234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Mark Flores', 'email' => 'mark@example.com', 'phone' => '09211234567', 'created_at' => now(), 'updated_at' => now()],
        ]);

        User::insert([
            ['username' => 'admin', 'full_name' => 'System Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'john', 'full_name' => 'John Smith', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'angela', 'full_name' => 'Angela Cruz', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'mark', 'full_name' => 'Mark Santos', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'lisa', 'full_name' => 'Lisa Reyes', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}