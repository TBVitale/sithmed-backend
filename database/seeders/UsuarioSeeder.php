<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $roles = DB::table('roles')->pluck('id', 'codigo');
        $ahora = now();

        // 1. Administrador
        DB::table('usuarios')->insertOrIgnore([
            'rol_id'     => $roles['ADMIN'],
            'nombre'     => 'Admin',
            'apellido'   => 'Sistema',
            'email'      => 'admin@sithmed.com',
            'password'   => Hash::make('password'),
            'activo'     => true,
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ]);

        // 2. Médico de Guardia (Dr. Benjamín Vitale) + Matrícula profesional
        $medicoExiste = DB::table('usuarios')->where('email', 'benjamin.vitale@sithmed.com')->exists();
        if (! $medicoExiste) {
            $medicoId = DB::table('usuarios')->insertGetId([
                'rol_id'     => $roles['MEDICO'],
                'nombre'     => 'Benjamín',
                'apellido'   => 'Vitale',
                'email'      => 'benjamin.vitale@sithmed.com',
                'password'   => Hash::make('password'),
                'activo'     => true,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ]);

            DB::table('profesionales')->insert([
                'usuario_id'     => $medicoId,
                'tipo_matricula' => 'MN',
                'jurisdiccion'   => 'NACIONAL',
                'matricula'      => '142890',
                'especialidad'   => 'Clínica Médica',
                'created_at'     => $ahora,
                'updated_at'     => $ahora,
            ]);
        }

        // 3. Enfermero de Triage + Matrícula profesional
        $enfermeroExiste = DB::table('usuarios')->where('email', 'enfermeria@sithmed.com')->exists();
        if (! $enfermeroExiste) {
            $enfermeroId = DB::table('usuarios')->insertGetId([
                'rol_id'     => $roles['ENFERMERO'],
                'nombre'     => 'Juan',
                'apellido'   => 'Ríos',
                'email'      => 'enfermeria@sithmed.com',
                'password'   => Hash::make('password'),
                'activo'     => true,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ]);

            DB::table('profesionales')->insert([
                'usuario_id'     => $enfermeroId,
                'tipo_matricula' => 'MN',
                'jurisdiccion'   => 'NACIONAL',
                'matricula'      => '98541',
                'especialidad'   => null,
                'created_at'     => $ahora,
                'updated_at'     => $ahora,
            ]);
        }

        // 4. Coordinación / Admisión
        DB::table('usuarios')->insertOrIgnore([
            'rol_id'     => $roles['COORDINADOR'],
            'nombre'     => 'Federico',
            'apellido'   => 'Egas',
            'email'      => 'coordinacion@sithmed.com',
            'password'   => Hash::make('password'),
            'activo'     => true,
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ]);
    }
}