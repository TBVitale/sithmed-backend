<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $obras = DB::table('obras_sociales')->pluck('id', 'nombre');
        $ahora = now();

        $pacientes = [
            [
                'dni'             => '17842110',
                'nombre'          => 'Carlos',
                'apellido'        => 'Méndez',
                'fecha_nacimiento'=> '1968-04-12',
                'sexo'            => 'M',
                'telefono'        => '1155551001',
                'obra_social'     => 'OSDE',
                'numero_afiliado' => '618421109901',
                'plan'            => '310',
            ],
            [
                'dni'             => '35120449',
                'nombre'          => 'Lucía',
                'apellido'        => 'Benítez',
                'fecha_nacimiento'=> '1992-08-25',
                'sexo'            => 'F',
                'telefono'        => '1155552002',
                'obra_social'     => 'Particular',
                'numero_afiliado' => 'PART-35120449',
                'plan'            => null,
            ],
            [
                'dni'             => '29881042',
                'nombre'          => 'Mariano',
                'apellido'        => 'Costa',
                'fecha_nacimiento'=> '1984-01-19',
                'sexo'            => 'M',
                'telefono'        => '1155553003',
                'obra_social'     => 'Swiss Medical',
                'numero_afiliado' => '800029881042',
                'plan'            => 'SMG20',
            ],
            [
                'dni'             => '44009213',
                'nombre'          => 'Sofía',
                'apellido'        => 'Rossi',
                'fecha_nacimiento'=> '2004-11-03',
                'sexo'            => 'F',
                'telefono'        => '1155554004',
                'obra_social'     => 'IOMA',
                'numero_afiliado' => '44009213/00',
                'plan'            => 'Plan A',
            ],
        ];

        foreach ($pacientes as $p) {
            $existe = DB::table('pacientes')->where('dni', $p['dni'])->exists();
            if ($existe) {
                continue;
            }

            $pacienteId = DB::table('pacientes')->insertGetId([
                'tipo_documento'   => 'DNI',
                'dni'              => $p['dni'],
                'nombre'           => $p['nombre'],
                'apellido'         => $p['apellido'],
                'fecha_nacimiento' => $p['fecha_nacimiento'],
                'sexo'             => $p['sexo'],
                'telefono'         => $p['telefono'],
                'created_at'       => $ahora,
                'updated_at'       => $ahora,
            ]);

            DB::table('coberturas')->insert([
                'paciente_id'     => $pacienteId,
                'obra_social_id'  => $obras[$p['obra_social']],
                'numero_afiliado' => $p['numero_afiliado'],
                'plan'            => $p['plan'],
                'vigente'         => true,
                'created_at'      => $ahora,
                'updated_at'      => $ahora,
            ]);
        }
    }
}