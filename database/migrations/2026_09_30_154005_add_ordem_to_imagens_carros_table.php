<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('imagens_carros', function (Blueprint $table) {
            $table->integer('ordem')->default(99);
        });
    }

    public function down()
    {
        Schema::table('imagens_carros', function (Blueprint $table) {
            $table->dropColumn('ordem');
        });
    }
};