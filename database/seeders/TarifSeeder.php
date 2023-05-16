<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarif = [
            [
                'daya' => '900 VA',
                'tarif_kwh' => 1444,
            ],
            [
                'daya' => '1300 VA',
                'tarif_kwh' => 1444,
            ],
            [
                'daya' => '2200 VA',
                'tarif_kwh' => 1444,
            ],
            [
                'daya' => '3500 VA',
                'tarif_kwh' => 1699,
            ],
        ];
        foreach ($tarif as $value) {
            Tarif::create($value);
        }
    }
}
