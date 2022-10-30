<?php

namespace Database\Factories;

use App\Models\TenagaKerja;
use Illuminate\Database\Eloquent\Factories\Factory;


class TenagaKerjaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TenagaKerja::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'angkatan_kerja' => $this->faker->numberBetween(0, 100),
            'pengangguran' => $this->faker->numberBetween(0, 100),
            'bkn_angkatan_kerja' => $this->faker->numberBetween(0, 100),
            'sekolah' => $this->faker->numberBetween(0, 100),
            'urus_ruta' => $this->faker->numberBetween(0, 100),
            'tpak' => $this->faker->numberBetween(0, 100),
            'tkk' => $this->faker->numberBetween(0, 100),
            'tpt' => $this->faker->numberBetween(0, 100),
            'lainnya' => $this->faker->numberBetween(0, 100),
            'gender' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
