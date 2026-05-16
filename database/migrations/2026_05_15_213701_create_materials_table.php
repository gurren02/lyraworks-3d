<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('type', 50)->nullable(); // PLA, ABS, etc
            $table->string('color', 50)->nullable();
            $table->decimal('stock_grams', 10, 2)->default(0);
            $table->decimal('price_per_gram', 10, 2)->default(0);
            $table->decimal('min_stock_alert', 10, 2)->default(100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
