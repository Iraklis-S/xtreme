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
    Schema::create('deposit_withdraw', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_account_id')->constrained('user_accounts')->onDelete('cascade');
        $table->decimal('amount', 8, 2);
        $table->enum('transaction_type', ['deposit', 'withdraw']);
        $table->string('currency', 3);
        $table->string('method')->nullable();
        $table->string('account_number')->nullable();
        $table->string('bank_name')->nullable();
        $table->string('bank_address')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_withdraw');
    }
};
