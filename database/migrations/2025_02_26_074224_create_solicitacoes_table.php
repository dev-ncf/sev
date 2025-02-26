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
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('solicitacoes_user_id_foreign');
            $table->unsignedBigInteger('funcionario_id')->nullable()->index('solicitacoes_funcionario_id_foreign');
            $table->unsignedBigInteger('tipo_id')->index('solicitacoes_tipo_id_foreign');
            $table->unsignedBigInteger('departamento_id')->index('solicitacoes_departamento_id_foreign');
            $table->enum('status', ['pendente', 'em andamento', 'concluida', 'rejeitada'])->default('pendente');
            $table->dateTime('data_criacao')->default('2025-01-07 11:16:33');
            $table->dateTime('data_conclusao')->nullable();
            $table->enum('prioridade', ['baixa', 'normal', 'alta'])->default('normal');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
