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
        Schema::create('encaminhamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('solicitacao_id')->index('encaminhamentos_solicitacao_id_foreign');
            $table->unsignedBigInteger('departamento_id')->index('encaminhamentos_departamento_id_foreign');
            $table->unsignedBigInteger('funcionario_id')->nullable()->index('encaminhamentos_funcionario_id_foreign');
            $table->enum('status', ['pendente', 'em andamento', 'concluida', 'rejeitada'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encaminhamentos');
    }
};
