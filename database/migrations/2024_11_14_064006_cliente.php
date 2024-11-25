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
        Schema::create("cliente", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('userId');
            $table->enum('status',['Activo','Inactivo'])->nullable()->default('Activo');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
