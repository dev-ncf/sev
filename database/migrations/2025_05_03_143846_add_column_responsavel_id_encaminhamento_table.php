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
        //
        Schema::table('encaminhamentos', function (Blueprint $table) {
            $table->foreignId('responsavel_id')->nullable()->constrained('funcionarios','id')->onDelete('CASCADE')->onUpdate("CASCADE")->after('funcionario_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('encaminhamentos', function (Blueprint $table) {

            $table->dropColumn('responsavel_id');

        });
    }
};
