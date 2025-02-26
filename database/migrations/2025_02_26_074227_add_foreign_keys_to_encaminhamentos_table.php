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
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->foreign(['departamento_id'])->references(['id'])->on('departamentos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['funcionario_id'])->references(['id'])->on('funcionarios')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['solicitacao_id'])->references(['id'])->on('solicitacoes')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->dropForeign('encaminhamentos_departamento_id_foreign');
            $table->dropForeign('encaminhamentos_funcionario_id_foreign');
            $table->dropForeign('encaminhamentos_solicitacao_id_foreign');
        });
    }
};
