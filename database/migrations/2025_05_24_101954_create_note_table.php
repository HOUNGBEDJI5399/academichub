<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */  public function up(): void
    {
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            
            // Clé étrangère vers la table users
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('users');
            
           
            for ($ue = 1; $ue <= 5; $ue++) {
                for ($matiere = 1; $matiere <= 3; $matiere++) {
                    $table->decimal("ue{$ue}_m{$matiere}_dev1", 4, 2)->nullable()->comment("UE{$ue} Matière{$matiere} Devoir 1");
                    $table->decimal("ue{$ue}_m{$matiere}_dev2", 4, 2)->nullable()->comment("UE{$ue} Matière{$matiere} Devoir 2");
                    $table->decimal("ue{$ue}_m{$matiere}_exam", 4, 2)->nullable()->comment("UE{$ue} Matière{$matiere} Examen");
                }
            }
            
            $table->timestamps();
            
            // Index pour améliorer les performances
            $table->index('etudiant_id');
            
            // Contrainte unique pour éviter les doublons
            $table->unique('etudiant_id', 'unique_etudiant_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('note', function (Blueprint $table) {
            $table->dropForeign(['etudiant_id']);
        });
        
        Schema::dropIfExists('note');
    }
};

