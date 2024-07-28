<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpfCnpj');
            $table->boolean('sexo');
            $table->boolean('cliente')->default(false);
            $table->boolean('funcionario')->default(false);
            $table->boolean('fornecedor')->default(false);
            $table->unsignedInteger('cidade_id');
            $table->string('bairro')->nullable();
            $table->string('rua')->nullable();
            $table->date('dataNascimento')->nullable();
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}


