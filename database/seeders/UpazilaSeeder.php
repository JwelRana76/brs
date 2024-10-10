<?php

namespace Database\Seeders;

use App\Models\Upazila;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = ['Bagherpara', 'Taraganj', 'Gangachara'];
        $item2 = ['1', '2', '3'];

        foreach ($item as $key => $value) {
            Upazila::create([
                'district_id' => $item2[$key],
                'name' => $value,
                'code' => rand(100, 1000),
            ]);
        }
    }
}
