<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usuario_id')->nullable()->unique()->constrained('usuarios');
        $table->string('tipo_documento', 20)->default('DNI');
        $table->string('dni', 20);
        $table->string('nombre', 80);
        $table->string('apellido', 80);
        $table->date('fecha_nacimiento');
        $table->char('sexo', 1)->nullable();
        $table->string('telefono', 30)->nullable();
        $table->string('email', 150)->nullable();
        $table->string('domicilio', 200)->nullable();
        $table->string('contacto_emergencia_nombre', 120)->nullable();
        $table->string('contacto_emergencia_telefono', 30)->nullable();
        $table->timestamps();
        $table->softDeletes();
        $table->unique(['tipo_documento', 'dni']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
