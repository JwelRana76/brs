<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'BRS',
            'name_short' => 'BRS',
            'address' => 'Rangpur Sadar, Rangpur',
            'contact' => '01571-166570',
        ]);
    }
}
