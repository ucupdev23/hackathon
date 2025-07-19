<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 100000; $i++) {
            Order::create([
                'user_id' => fake()->randomElement($userIds),
                'order_date' => fake()->dateTimeBetween('-2 years', 'now'),
                'total_amount' => 0,
                'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            ]);
        }
    }
}
