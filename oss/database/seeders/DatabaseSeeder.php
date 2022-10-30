<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Kategori::factory(5)->create();
        \App\Models\Inflasi::factory(5)->create();
        \App\Models\InflasiKlmpkPengeluaran::factory(5)->create();
        // \App\Models\InflasiKota::factory(5)->create();
        // \App\Models\Ipm::factory(5)->create();
        \App\Models\Kemiskinan::factory(5)->create();
        \App\Models\Ketimpangan::factory(5)->create();
        \App\Models\Pdrb::factory(5)->create();
        \App\Models\Penduduk::factory(5)->create();
        // \App\Models\PendudukKecamatan::factory(5)->create();
        \App\Models\Pengangguran::factory(5)->create();
        // \App\Models\TenagaKerja ::factory(5)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
