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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreign(['departamento_id'])->references(['id'])->on('departamentos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign('funcionarios_departamento_id_foreign');
            $table->dropForeign('funcionarios_id_foreign');
        });
    }
};
