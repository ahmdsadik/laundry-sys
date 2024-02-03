<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'role' => Roles::ADMIN,
            'password' => 1234,
            'email_verified_at' => '2024-02-02 14:26:10',
        ]);
        User::create([
            'first_name' => 'عمر محمد',
            'last_name' => 'زياد',
            'email' => 'staff@demo.com',
            'phone' => '0124574556',
            'role' => Roles::EMPLOYEE,
            'password' => 1234,
            'email_verified_at' => '2024-02-02 14:26:10',
        ]);
    }
}
