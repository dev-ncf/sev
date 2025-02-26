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
        Schema::table('despachos', function (Blueprint $table) {
            $table->foreign(['anexo_id'])->references(['id'])->on('anexos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['funcionario_id'])->references(['id'])->on('funcionarios')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['solicitacao_id'])->references(['id'])->on('solicitacoes')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('despachos', function (Blueprint $table) {
            $table->dropForeign('despachos_anexo_id_foreign');
            $table->dropForeign('despachos_funcionario_id_foreign');
            $table->dropForeign('despachos_solicitacao_id_foreign');
        });
    }
};
