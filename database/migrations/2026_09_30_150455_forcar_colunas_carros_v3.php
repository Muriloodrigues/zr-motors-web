<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('carros', function (Blueprint $table) {
            if (!Schema::hasColumn('carros', 'categoria')) { $table->string('categoria')->nullable(); }
            if (!Schema::hasColumn('carros', 'tipo_veiculo')) { $table->string('tipo_veiculo')->nullable(); }
            if (!Schema::hasColumn('carros', 'potencia_motor')) { $table->string('potencia_motor')->nullable(); }
            if (!Schema::hasColumn('carros', 'combustivel')) { $table->string('combustivel')->nullable(); }
            if (!Schema::hasColumn('carros', 'tipo_direcao')) { $table->string('tipo_direcao')->nullable(); }
            if (!Schema::hasColumn('carros', 'cor')) { $table->string('cor')->nullable(); }
            if (!Schema::hasColumn('carros', 'portas')) { $table->integer('portas')->nullable(); }
            if (!Schema::hasColumn('carros', 'final_placa')) { $table->integer('final_placa')->nullable(); }
            if (!Schema::hasColumn('carros', 'kit_gnv')) { $table->string('kit_gnv')->nullable(); }
            if (!Schema::hasColumn('carros', 'descricao')) { $table->text('descricao')->nullable(); }
            if (!Schema::hasColumn('carros', 'opcionais')) { $table->text('opcionais')->nullable(); }
        });
    }

    public function down()
    {
        
    }
};