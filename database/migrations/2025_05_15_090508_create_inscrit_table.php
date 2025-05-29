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
        Schema::create('inscrit', function (Blueprint $table) {
            $table->id();
             $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('matricule')->unique();
            $table->string('annee');
            $table->string('niveau');
            $table->string('tel');

        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscrit');
    }
};
