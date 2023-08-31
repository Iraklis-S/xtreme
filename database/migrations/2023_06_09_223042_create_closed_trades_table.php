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
        Schema::create('closed_trades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_id');
            $table->decimal('close_price', 12, 4)->nullable();
            $table->enum('status', ['open', 'closed']);
            $table->timestamps();
            
            $table->foreign('trade_id')->references('id')->on('tradings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closed_trades');
    }
};
