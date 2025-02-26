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
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->foreign(['departamento_id'])->references(['id'])->on('departamentos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['funcionario_id'])->references(['id'])->on('funcionarios')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['tipo_id'])->references(['id'])->on('tipos_solicitacao')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitacoes', function (Blueprint $table) {
            $table->dropForeign('solicitacoes_departamento_id_foreign');
            $table->dropForeign('solicitacoes_funcionario_id_foreign');
            $table->dropForeign('solicitacoes_tipo_id_foreign');
            $table->dropForeign('solicitacoes_user_id_foreign');
        });
    }
};
