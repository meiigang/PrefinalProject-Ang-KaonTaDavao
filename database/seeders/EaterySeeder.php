<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\District;
use App\Models\Eatery;
use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EaterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poblacion = District::where('name', 'Poblacion')->firstOrFail();
        $suki = Feature::where('name', 'Suki ni Ang')->firstOrFail();
        $budgetMeal = Feature::where('name', 'Budget Meal')->firstOrFail();

        $myEatery = Eatery::create([
            'district_id' => $poblacion->id,
            'name' => 'Carinderia ni Ang',
            'slug' => Str::slug('Carinderia ni Ang'),
            'address' => 'San Pedro St., Poblacion, Davao City',
            'price_range' => 'budget',
            'specialty' => 'Tinolang Manok',
            'is_open' => true,
        ]);

        $myEatery->features()->sync([$suki->id, $budgetMeal->id]);
        $myEatery->permit()->create([
            'permit_no' => 'DVO-2026-0808',
            'expires_on' => '2027-08-08',
        ]);
        $myEatery->dishes()->createMany([
            ['name' => 'Tinolang Manok', 'price' => 85.00, 'is_bestseller' => true],
            ['name' => 'Kinilaw na Tuna', 'price' => 120.00, 'is_bestseller' => false],
            ['name' => 'Durian Shake', 'price' => 75.00, 'is_bestseller' => false],
        ]);

        $districtIds = District::pluck('id')->all();
        $featureIds = Feature::pluck('id')->all();

        $openEateries = collect();
        for ($i = 0; $i < 11; $i++) {
            $openEateries->push(Eatery::factory()->create([
                'district_id' => fake()->randomElement($districtIds),
            ]));
        }

        $closedEateries = collect();
        for ($i = 0; $i < 3; $i++) {
            $closedEateries->push(Eatery::factory()->closed()->create([
                'district_id' => fake()->randomElement($districtIds),
            ]));
        }

        foreach ($openEateries->concat($closedEateries) as $index => $eatery) {
            $eatery->permit()->create([
                'permit_no' => 'DVO-'.fake()->numberBetween(2024, 2026).'-'.fake()->unique()->numberBetween(1000, 99999),
                'expires_on' => $index === 0
                    ? now()->subMonths(2)->toDateString()
                    : fake()->dateTimeBetween('2026-01-01', '2028-12-31')->format('Y-m-d'),
            ]);

            Dish::factory()
                ->count(fake()->numberBetween(2, 5))
                ->create(['eatery_id' => $eatery->id]);

            $eatery->features()->attach(
                fake()->randomElements($featureIds, fake()->numberBetween(1, 3))
            );
        }
    }
}
