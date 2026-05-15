<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('technology', ['FDM', 'SLA'])->default('FDM');
            $table->enum('status', ['disponible', 'imprimiendo', 'mantenimiento'])->default('disponible');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('printers');
    }
};
