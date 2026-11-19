<?php

namespace Database\Seeders;

use App\Models\Eatery;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myEatery = Eatery::where('slug', 'carinderia-ni-ang')->firstOrFail();
        $tita = User::where('email', 'tita.ang@kaonta.test')->firstOrFail();
        $users = User::all();

        $myEatery->reviews()->create([
            'user_id' => $tita->id,
            'rating' => 5,
            'body' => 'Lami kaayo! Balik-balikan ni Tita Ang.',
        ]);

        for ($i = 0; $i < fake()->numberBetween(2, 4); $i++) {
            $myEatery->reviews()->create([
                'user_id' => $users->random()->id,
                'rating' => fake()->numberBetween(1, 5),
                'body' => fake()->paragraph(),
            ]);
        }

        $openFactoryEateries = Eatery::where('is_open', true)
            ->where('slug', '!=', 'carinderia-ni-ang')
            ->get();

        foreach ($openFactoryEateries as $eatery) {
            $count = fake()->numberBetween(0, 6);

            for ($i = 0; $i < $count; $i++) {
                $eatery->reviews()->create([
                    'user_id' => $users->random()->id,
                    'rating' => fake()->numberBetween(1, 5),
                    'body' => fake()->paragraph(),
                ]);
            }
        }
    }
}
