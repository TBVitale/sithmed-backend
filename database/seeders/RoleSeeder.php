<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insertOrIgnore([
            ['codigo' => 'ADMIN',        'nombre' => 'Administrador'],
            ['codigo' => 'MEDICO',       'nombre' => 'Médico de Guardia'],
            ['codigo' => 'ENFERMERO',    'nombre' => 'Enfermero/a'],
            ['codigo' => 'COORDINADOR',  'nombre' => 'Coordinación'],
            ['codigo' => 'FARMACEUTICO', 'nombre' => 'Farmacéutico/a'],
            ['codigo' => 'MAESTRANZA',   'nombre' => 'Maestranza'],
            ['codigo' => 'PACIENTE',     'nombre' => 'Paciente'],
        ]);
    }
}