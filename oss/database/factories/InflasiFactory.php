<?php

namespace Database\Factories;

use App\Models\Inflasi;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Kategori;

class InflasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inflasi::class;

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
            'sembako' => $this->faker->randomFloat(3, 0, 9),
            'sandang' => $this->faker->randomFloat(3, 0, 9),
            'perumahan' => $this->faker->randomFloat(3, 0, 9),
            'perlengkapan' => $this->faker->randomFloat(3, 0, 9),
            'kesehatan' => $this->faker->randomFloat(3, 0, 9),
            'transportasi' => $this->faker->randomFloat(3, 0, 9),
            'informasi' => $this->faker->randomFloat(3, 0, 9),
            'rekreasi' => $this->faker->randomFloat(3, 0, 9),
            'pendidikan' => $this->faker->randomFloat(3, 0, 9),
            'penyedia_pangan' => $this->faker->randomFloat(3, 0, 9),
            'perawatan_pribadi' => $this->faker->randomFloat(3, 0, 9),
            'total_inflasi' => $this->faker->randomFloat(3, 0, 9),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
