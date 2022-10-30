<?php

namespace Database\Factories;

use App\Models\Ketimpangan;
use Illuminate\Database\Eloquent\Factories\Factory;


class KetimpanganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ketimpangan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'jumlah' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
