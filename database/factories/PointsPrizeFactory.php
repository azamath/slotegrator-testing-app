<?php

namespace Database\Factories;

use App\Models\PointsPrize;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointsPrizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PointsPrize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(200, 2000),
            'is_converted' => 0,
        ];
    }
}
