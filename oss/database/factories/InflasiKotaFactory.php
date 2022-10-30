<?php

namespace Database\Factories;

use App\Models\InflasiKota;
use Illuminate\Database\Eloquent\Factories\Factory;


class InflasiKotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InflasiKota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nama_kota' => $this->faker->name,
            'mtom' => $this->faker->randomFloat(3, 0, 9),
            'ytod' => $this->faker->randomFloat(3, 0, 9),
            'ytoy' => $this->faker->randomFloat(3, 0, 9),
            'total' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
