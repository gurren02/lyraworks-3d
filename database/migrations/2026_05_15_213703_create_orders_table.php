<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pendiente', 'cotizado', 'aprobado', 'imprimiendo', 'terminado', 'entregado'])
                  ->default('pendiente');
            $table->decimal('total_price', 10, 2)->default(0.00);
            $table->date('estimated_delivery_date')->nullable();
            
            // Campos para el envío (se llenan cuando pasa a terminado/envio)
            $table->text('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
