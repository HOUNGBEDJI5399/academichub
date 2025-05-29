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
        Schema::create('cour', function (Blueprint $table) {
           
            $table->id();
            $table->string('nom_cour');
            $table->enum('categorie', ['L1', 'L2', 'L3']);
            $table->string('fichier');
            $table->string('fichierType');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cour');
    }
};
