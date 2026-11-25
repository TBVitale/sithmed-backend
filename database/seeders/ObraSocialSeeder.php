<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSocialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('obras_sociales')->insertOrIgnore([
            ['nombre' => 'OSDE',          'sigla' => 'OSDE', 'activa' => true],
            ['nombre' => 'Swiss Medical', 'sigla' => 'SMG',  'activa' => true],
            ['nombre' => 'IOMA',          'sigla' => 'IOMA', 'activa' => true],
            ['nombre' => 'Galeno',        'sigla' => 'GAL',  'activa' => true],
            ['nombre' => 'PAMI',          'sigla' => 'PAMI', 'activa' => true],
            ['nombre' => 'Particular',    'sigla' => null,   'activa' => true],
        ]);
    }
}