<?php

namespace Database\Factories;

use App\Models\Ipm;
use Illuminate\Database\Eloquent\Factories\Factory;


class IpmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ipm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'uhh' => $this->faker->randomFloat(3, 0, 9),
            'rls' => $this->faker->randomFloat(3, 0, 9),
            'hls' => $this->faker->randomFloat(3, 0, 9),
            'ppp' => $this->faker->randomFloat(3, 0, 9),
            'ipm' => $this->faker->randomFloat(3, 0, 9),
            'pertumbuhan' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
