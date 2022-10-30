<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;


class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'a' => $this->faker->numberBetween(0, 1000),
            'b' => $this->faker->numberBetween(0, 1000),
            'c' => $this->faker->numberBetween(0, 1000),
            'd' => $this->faker->numberBetween(0, 1000),
            'e' => $this->faker->numberBetween(0, 1000),
            'f' => $this->faker->numberBetween(0, 1000),
            'g' => $this->faker->numberBetween(0, 1000),
            'h' => $this->faker->numberBetween(0, 1000),
            'i' => $this->faker->numberBetween(0, 1000),
            'j' => $this->faker->numberBetween(0, 1000),
            'k' => $this->faker->numberBetween(0, 1000),
            'l' => $this->faker->numberBetween(0, 1000),
            'm' => $this->faker->numberBetween(0, 1000),
            'n' => $this->faker->numberBetween(0, 1000),
            'o' => $this->faker->numberBetween(0, 1000),
            'p' => $this->faker->numberBetween(0, 100),
            'total' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
