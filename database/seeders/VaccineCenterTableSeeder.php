<?php

namespace Database\Seeders;


use App\Models\VaccineCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineCenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centers = [
            ['center_name' => 'Center A', 'daily_limit' => 1],
            ['center_name' => 'Center B', 'daily_limit' => 1],
            ['center_name' => 'Center C', 'daily_limit' => 1],
            ['center_name' => 'Center D', 'daily_limit' => 1],
            ['center_name' => 'Center E', 'daily_limit' => 1],
            ['center_name' => 'Center F', 'daily_limit' => 1],
            ['center_name' => 'Center G', 'daily_limit' => 1],
            ['center_name' => 'Center H', 'daily_limit' => 1],
            ['center_name' => 'Center I', 'daily_limit' => 1],
            ['center_name' => 'Center J', 'daily_limit' => 1],
            ['center_name' => 'Center K', 'daily_limit' => 1],
            ['center_name' => 'Center L', 'daily_limit' => 1],
            ['center_name' => 'Center M', 'daily_limit' => 1],
            ['center_name' => 'Center N', 'daily_limit' => 1],
            ['center_name' => 'Center O', 'daily_limit' => 1],
            ['center_name' => 'Center P', 'daily_limit' => 1],
            ['center_name' => 'Center Q', 'daily_limit' => 1],
            ['center_name' => 'Center R', 'daily_limit' => 1],
            ['center_name' => 'Center S', 'daily_limit' => 1],
            ['center_name' => 'Center T', 'daily_limit' => 1],
        ];

        foreach ($centers as $center) {
            VaccineCenter::create($center);
        }
    }
}
