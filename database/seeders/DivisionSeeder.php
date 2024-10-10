<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = ['Khulna', 'Rangpur', 'Rajshahi'];

        foreach ($item as $key => $value) {
            Division::create([
                'name' => $value,
                'code' => rand(100, 1000),
            ]);
        }
    }
}
