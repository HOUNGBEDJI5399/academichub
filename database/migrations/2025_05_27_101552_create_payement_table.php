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
        Schema::create('payement', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('niveau');
            $table->foreignId('user_id')->constrained();
             $table->string('transaction_id')->unique();
            $table->string('fedapay_transaction_id')->nullable();
           
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('XOF');
            $table->string('status')->default('pending'); // pending, completed, failed, cancelled
            $table->string('payment_method')->nullable(); // mtn, moov, card
            $table->string('phone_number')->nullable();
            $table->string('callback_url')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payement');
    }
};
