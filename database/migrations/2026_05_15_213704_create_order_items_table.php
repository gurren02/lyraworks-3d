<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('printer_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('material_id')->constrained()->onDelete('cascade');
            
            $table->string('file_name', 255);
            $table->string('file_path', 255);
            $table->decimal('weight_grams', 8, 2);
            $table->integer('print_time_mins');
            $table->integer('quantity')->default(1);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
