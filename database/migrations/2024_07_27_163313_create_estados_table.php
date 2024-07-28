<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 120)->nullable();
            $table->string('uf')->nullable();
            $table->timestamps();

    });

            DB::statement("INSERT INTO `estados` (`id`, `nome`, `uf`) VALUES
                (1, 'Acre', 'AC'),
                (2, 'Alagoas', 'AL'),
                (3, 'Amazonas', 'AM'),
                (4, 'Amapá', 'AP'),
                (5, 'Bahia', 'BA'),
                (6, 'Ceará', 'CE'),
                (7, 'Distrito Federal', 'DF'),
                (8, 'Espirito Santo', 'ES'),
                (9, 'Goiás', 'GO'),
                (10, 'Maranhão', 'MA'),
                (11, 'Minas Gerais', 'MG'),
                (12, 'Mato Grosso do Sul', 'MS'),
                (13, 'Mato Grosso', 'MT'),
                (14, 'Pará', 'PA'),
                (15, 'Paraíba', 'PB'),
                (16, 'Pernambuco', 'PE'),
                (17, 'Piauà', 'PI'),
                (18, 'Paraná', 'PR'),
                (19, 'Rio de Janeiro', 'RJ'),
                (20, 'Rio Grande do Norte', 'RN'),
                (21, 'Rondonia', 'RO'),
                (22, 'Roraima', 'RR'),
                (23, 'Rio Grande do Sul', 'RS'),
                (24, 'Santa Catarina', 'SC'),
                (25, 'Sergipe', 'SE'),
                (26, 'São Paulo', 'SP'),
                (27, 'Tocantins', 'TO');
    ");
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidades');
    }
};