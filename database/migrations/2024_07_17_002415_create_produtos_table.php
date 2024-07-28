<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoBarras');
            $table->string('nome');
            $table->text('observacao')->nullable();
            $table->string('categoria') ->nullable();
            $table->string('marca')->nullable();
            $table->string('sku');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('unidadeMedida_id');
            $table->decimal('peso', 10, 2)->nullable();
            $table->string('dimensoes')->nullable();
            $table->date('dataEntradaEstoque');
            $table->tinyInteger('status')->default(1); // Tipo tinyint para status binário (0 ou 1)
            $table->timestamps();
            $table->string('referencia')->default('');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

