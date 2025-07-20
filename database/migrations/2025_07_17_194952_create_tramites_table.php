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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('documento'); //Tipo de tramite o documento
            $table->string('codigo')->unique();
            $table->string('solicitante');
            $table->date('fecha_inicio');
            $table->string('estado')->default('Pendiente');

            $table->text('descripcion')->nullable(); //Descripción del trámite
            $table->text('observaciones')->nullable(); //Observaciones del trámite
            $table->text('resultado')->nullable();       // Resultado final del trámite, si corresponde

            $table->string('archivo_adjunto')->nullable();
            //Relacion con la tabla de usuarios
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};