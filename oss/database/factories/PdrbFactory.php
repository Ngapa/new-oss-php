<?php

namespace Database\Factories;

use App\Models\Pdrb;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Kategori;

class PdrbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pdrb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kategori = Kategori::first();
        if (!$kategori) {
            $kategori = Kategori::factory()->create();
        }

        return [
            'kategori_id' => $kategori,
            'a' => $this->faker->randomFloat(3, 0, 9),
            'b' => $this->faker->randomFloat(3, 0, 9),
            'c' => $this->faker->randomFloat(3, 0, 9),
            'd' => $this->faker->randomFloat(3, 0, 9),
            'e' => $this->faker->randomFloat(3, 0, 9),
            'f' => $this->faker->randomFloat(3, 0, 9),
            'g' => $this->faker->randomFloat(3, 0, 9),
            'h' => $this->faker->randomFloat(3, 0, 9),
            'i' => $this->faker->randomFloat(3, 0, 9),
            'j' => $this->faker->randomFloat(3, 0, 9),
            'k' => $this->faker->randomFloat(3, 0, 9),
            'l' => $this->faker->randomFloat(3, 0, 9),
            'm_n' => $this->faker->randomFloat(3, 0, 9),
            'o' => $this->faker->randomFloat(3, 0, 9),
            'p' => $this->faker->randomFloat(3, 0, 9),
            'q' => $this->faker->randomFloat(3, 0, 9),
            'r_s_t_u' => $this->faker->randomFloat(3, 0, 9),
            'total_pdrb' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
