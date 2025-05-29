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
        Schema::table('presencel3', function (Blueprint $table) {
              $table->unsignedBigInteger('etudiant_id')->nullable()->after('id');
            $table->foreign('etudiant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presencel3', function (Blueprint $table) {
               $table->dropForeign(['etudiant_id']);
            $table->dropColumn('etudiant_id');
        });
        

    }
};
