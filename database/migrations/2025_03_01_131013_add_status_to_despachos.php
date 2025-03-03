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
            //
            $table->string('descricao')->nullable()->after('anexo_id');
            $table->enum('status',['Aprovado','Rejeitado'])->default('Rejeitado')->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('despachos', function (Blueprint $table) {
            //
            $table->dropColumn('descricao');
            $table->dropColumn('status');
        });
    }
};
