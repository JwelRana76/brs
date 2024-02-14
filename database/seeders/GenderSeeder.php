<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = ['Male', 'Female', 'Other'];

        foreach ($item as $key => $value) {
            Gender::create([
                'name' => $value,
            ]);
        }
    }
}
