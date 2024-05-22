<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {
            Order::create([
                'provider_id' => $faker->numberBetween(1, 3), 
                'service_id' => $faker->numberBetween(1, 3), 
                'total_time' => $faker->numberBetween(1, 2),
                'earnings' => $faker->numberBetween(1, 1000), 
                'status' => $faker->randomElement(['created', 'payed', 'started', 'finished', 'confirmed', 'closed', 'canceled']),
                'created_at' => $faker->dateTimeBetween('-10 days', 'now'),
                'updated_at' => $faker->dateTimeBetween('-10 days', 'now'),
            ]);
        }
    }
}
