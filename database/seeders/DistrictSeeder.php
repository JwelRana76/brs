<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = ['Jashore', 'Rangpur', 'Pabna'];
        $item2 = ['1', '2', '3'];

        foreach ($item as $key => $value) {
            District::create([
                'division_id' => $item2[$key],
                'name' => $value,
                'code' => rand(100, 1000),
            ]);
        }
    }
}
