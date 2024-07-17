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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('value');
            $table->foreignUuid('payer_id');//removed for testing purposes ->constrained('wallets')->onDelete('cascade');
            $table->foreignUuid('payee_id');//removed for testing purposes ->constrained('wallets')->onDelete('cascade');
            $table->string('status')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
