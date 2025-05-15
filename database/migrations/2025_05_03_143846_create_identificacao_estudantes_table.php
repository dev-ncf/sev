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
        //
        Schema::create('identificacao_estudantes', function (Blueprint $table) {

            $table->id();
            $table->string('tipo_documento',60);
            $table->string('numero_documento',60);
            $table->string('documento',255);
            $table->foreignId('estudante_id')->constrained('estudantes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('identificacao_estudantes');

    }
};
