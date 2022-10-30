<?php

namespace Database\Factories;

use App\Models\PendudukKecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;


class PendudukKecamatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PendudukKecamatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'kecamatan' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'lk' => $this->faker->numberBetween(0, 100),
            'pr' => $this->faker->numberBetween(0, 100),
            'total' => $this->faker->numberBetween(0, 100),
            'rasio_jk' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
