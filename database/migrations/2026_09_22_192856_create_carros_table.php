<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('carros', function (Blueprint $table) {
        $table->id();
        
        $table->string('marca');
        $table->string('modelo');
        $table->integer('ano_fabricacao');
        $table->integer('ano_modelo');
        $table->decimal('preco', 10, 2);
        $table->integer('quilometragem');
        $table->string('cambio');
        $table->string('status')->default('Disponível');
        $table->string('categoria')->nullable();
        $table->string('tipo_veiculo')->nullable();
        $table->string('potencia_motor')->nullable();
        $table->string('combustivel')->nullable();
        $table->string('tipo_direcao')->nullable();
        $table->string('cor')->nullable();
        $table->integer('portas')->nullable();
        $table->integer('final_placa')->nullable();
        $table->string('kit_gnv')->nullable();
        $table->text('descricao')->nullable();
        $table->text('opcionais')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
