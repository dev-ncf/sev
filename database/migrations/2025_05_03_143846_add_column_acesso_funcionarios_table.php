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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->enum('acesso',['A','B'])->default('B');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('funcionarios', function (Blueprint $table) {

            $table->dropColumn('acesso');

        });
    }
};
