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
        Schema::create('tradings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_account_id');
            $table->string('symbol');
            $table->decimal('price', 12, 4);
            $table->unsignedInteger('quantity');
            $table->string('action');
            $table->decimal('profit', 12, 4)->nullable();
            $table->decimal('take_profit',12,4)->nullable();
            $table->decimal('stop_loss',12,4)->nullable();
            $table->timestamps();
            $table->foreign('user_account_id')->references('id')->on('user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading');
    }
};
