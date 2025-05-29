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
        Schema::create('emploi', function (Blueprint $table) {
            $table->id();
            $table->string('annee');                // Pour stocker l'année académique (ex: "2025-2026")
            $table->string('classe');               // Pour stocker l'année de licence (ex: "L1")
            $table->string('semaine');              // Pour stocker la semaine (ex: "Semaine 1")
            
            // Lundi
            $table->string('lundi_8h')->nullable();
            $table->string('lundi_9h')->nullable();
            $table->string('lundi_10h')->nullable();
            $table->string('lundi_11h')->nullable();
            $table->string('lundi_12h')->nullable();
            $table->string('lundi_13h')->nullable();
            $table->string('lundi_14h')->nullable();
            $table->string('lundi_15h')->nullable();
            $table->string('lundi_16h')->nullable();
            
            // Mardi
            $table->string('mardi_8h')->nullable();
            $table->string('mardi_9h')->nullable();
            $table->string('mardi_10h')->nullable();
            $table->string('mardi_11h')->nullable();
            $table->string('mardi_12h')->nullable();
            $table->string('mardi_13h')->nullable();
            $table->string('mardi_14h')->nullable();
            $table->string('mardi_15h')->nullable();
            $table->string('mardi_16h')->nullable();
            
            // Mercredi
            $table->string('mercredi_8h')->nullable();
            $table->string('mercredi_9h')->nullable();
            $table->string('mercredi_10h')->nullable();
            $table->string('mercredi_11h')->nullable();
            $table->string('mercredi_12h')->nullable();
            $table->string('mercredi_13h')->nullable();
            $table->string('mercredi_14h')->nullable();
            $table->string('mercredi_15h')->nullable();
            $table->string('mercredi_16h')->nullable();
            
            // Jeudi
            $table->string('jeudi_8h')->nullable();
            $table->string('jeudi_9h')->nullable();
            $table->string('jeudi_10h')->nullable();
            $table->string('jeudi_11h')->nullable();
            $table->string('jeudi_12h')->nullable();
            $table->string('jeudi_13h')->nullable();
            $table->string('jeudi_14h')->nullable();
            $table->string('jeudi_15h')->nullable();
            $table->string('jeudi_16h')->nullable();
            
            // Vendredi
            $table->string('vendredi_8h')->nullable();
            $table->string('vendredi_9h')->nullable();
            $table->string('vendredi_10h')->nullable();
            $table->string('vendredi_11h')->nullable();
            $table->string('vendredi_12h')->nullable();
            $table->string('vendredi_13h')->nullable();
            $table->string('vendredi_14h')->nullable();
            $table->string('vendredi_15h')->nullable();
            $table->string('vendredi_16h')->nullable();
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi');
    }
};
