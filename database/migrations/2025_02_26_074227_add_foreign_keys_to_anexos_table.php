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
        Schema::table('anexos', function (Blueprint $table) {
            $table->foreign(['solicitacao_id'])->references(['id'])->on('solicitacoes')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anexos', function (Blueprint $table) {
            $table->dropForeign('anexos_solicitacao_id_foreign');
        });
    }
};
