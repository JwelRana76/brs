<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];

        foreach ($item as $key => $value) {
            BloodGroup::create([
                'name' => $value,
            ]);
        }
    }
}
