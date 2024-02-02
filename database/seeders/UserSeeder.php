<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'إسلام احمد',
            'last_name' => 'زياد',
            'email' => 'admin@demo.com',
            'phone' => '0124578456',
            'hire_date' => '2024-02-02 14:26:10',
            'role' => 1,
            'password' => Hash::make('1234'),
            'email_verified_at' => '2024-02-02 14:26:10',
            'remember_token' => 'token',
        ]);
        User::create([
            'first_name' => 'عمر محمد',
            'last_name' => 'زياد',
            'email' => 'staff@demo.com',
            'phone' => '0124574556',
            'hire_date' => '2024-02-02 14:26:10',
            'role' => 2,
            'password' => Hash::make('1234'),
            'email_verified_at' => '2024-02-02 14:26:10',
            'remember_token' => 'token',
        ]);
    }
}
