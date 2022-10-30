<?php

namespace Database\Factories;

use App\Models\Pengangguran;
use Illuminate\Database\Eloquent\Factories\Factory;


class PengangguranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengangguran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'tpak' => $this->faker->randomFloat(3, 0, 9),
            'tpt' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
