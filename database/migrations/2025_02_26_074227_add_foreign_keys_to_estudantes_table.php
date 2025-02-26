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
        Schema::table('estudantes', function (Blueprint $table) {
            $table->foreign(['curso_id'])->references(['id'])->on('cursos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->dropForeign('estudantes_curso_id_foreign');
            $table->dropForeign('estudantes_id_foreign');
        });
    }
};
