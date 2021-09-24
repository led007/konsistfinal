<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nasc');
            $table->enum('status', ['Ativo', 'Suspenso']);
            $table->string('idade');
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->enum('escolaridade', ['Ensino Médio', 'Graduação','Graduação Incompleta','Pós-graduado','Ensino Técnico']);
            $table->string('cep', 9)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('cargo')->nullable();
            $table->date('data_admiss')->nullable();
            $table->date('data_demiss')->nullable();
            $table->text('responsabilidades')->nullable();
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->string('cpf')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
