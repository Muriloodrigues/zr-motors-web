<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('carros', function (Blueprint $table) {
            $table->string('categoria')->nullable();
            $table->string('tipo_veiculo')->nullable();
            $table->string('potencia_motor')->nullable();
            $table->string('combustivel')->nullable(); // <-- Adicionado!
            $table->string('tipo_direcao')->nullable();
            $table->string('cor')->nullable();
            $table->integer('portas')->nullable();
            $table->integer('final_placa')->nullable();
            $table->string('kit_gnv')->nullable();
            $table->text('descricao')->nullable();
            $table->text('opcionais')->nullable();
        });
    }

    public function down()
    {
        Schema::table('carros', function (Blueprint $table) {
            $table->dropColumn([
                'categoria', 'tipo_veiculo', 'potencia_motor', 'combustivel',
                'tipo_direcao', 'cor', 'portas', 'final_placa', 
                'kit_gnv', 'descricao', 'opcionais'
            ]);
        });
    }
};