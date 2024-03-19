<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'hotel_id' => \App\Models\Hotel::factory(),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+2 days', '+2 months')->format('Y-m-d'),
            'rooms_book' => $this->faker->numberBetween(1, 5),
        ];
    }
}
