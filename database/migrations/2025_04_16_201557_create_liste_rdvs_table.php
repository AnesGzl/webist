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
    Schema::create('liste_rdvs', function (Blueprint $table) {
        // Matricule = clé primaire, 5 chiffres
        $table->integer('matricule')->primary();

        // Motif : enum limité à deux valeurs
        $table->enum('motif', ['consultation', 'urgences']);

        // Service : chaîne (depuis la liste)
        $table->string('service');

        // Date du rendez-vous
        $table->date('date');

        // Timestamps Laravel
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liste_rdvs');
    }
};
