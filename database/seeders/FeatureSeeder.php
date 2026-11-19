<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Suki ni Ang', 'Budget Meal', 'Halal', 'Open 24 Hours', 'Aircon', 'Vegan-Friendly'] as $name) {
            Feature::create(['name' => $name]);
        }
    }
}
