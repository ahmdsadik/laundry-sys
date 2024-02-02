<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'كي',
                'description' => 'كي'
            ],
            [
                'name' => 'تنظيف',
                'description' => 'تنظيف'
            ],
            [
                'name' => 'صباغه',
                'description' => 'صباغه'
            ],
            [
                'name' => 'غسيل',
                'description' => 'غسيل'
            ]
        ];
        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'description' => $service['description']
            ]);
        }
    }
}
