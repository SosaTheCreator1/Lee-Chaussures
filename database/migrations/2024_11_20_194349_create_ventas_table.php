<?php

//faltan importar las clases las clases:(

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
        Schema::create('ventas', function (Blueprint $table) {

            $table->id('idVenta'); 
            $table->date('fecha'); 
            $table-foreignIdFor(Cliente::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table-foreignIdFor(Empleado::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate(); 
            $table->double('total', 8, 2);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
