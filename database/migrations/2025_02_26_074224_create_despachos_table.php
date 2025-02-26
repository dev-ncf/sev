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
        Schema::create('despachos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('solicitacao_id')->index('despachos_solicitacao_id_foreign');
            $table->unsignedBigInteger('funcionario_id')->nullable()->index('despachos_funcionario_id_foreign');
            $table->unsignedBigInteger('anexo_id')->nullable()->index('despachos_anexo_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despachos');
    }
};
