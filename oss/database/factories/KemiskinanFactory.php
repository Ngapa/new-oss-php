<?php

namespace Database\Factories;

use App\Models\Kemiskinan;
use Illuminate\Database\Eloquent\Factories\Factory;


class KemiskinanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kemiskinan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'pddk_mskn' => $this->faker->randomFloat(3, 0, 9),
            'p0' => $this->faker->randomFloat(3, 0, 9),
            'p1' => $this->faker->randomFloat(3, 0, 9),
            'p2' => $this->faker->randomFloat(3, 0, 9),
            'gk' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
