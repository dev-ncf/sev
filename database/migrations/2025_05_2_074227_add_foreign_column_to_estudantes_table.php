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
            $table->string('nome',60)->after('id');
            $table->string('apelido',60)->after('nome');
            $table->enum('genero',['M','F'])->after('apelido');
            $table->date('data_nascimento')->after('genero');
            $table->foreignId('departamento_id')->after('data_nascimento')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('nivel')->after('departamento_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {

        $table->dropForeign(['departamento_id']);

        // Depois as colunas associadas
        $table->dropColumn(['nome', 'apelido', 'genero', 'data_nascimento', 'departamento_id', 'nivel']);
        });
    }
};
