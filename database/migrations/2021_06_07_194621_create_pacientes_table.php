<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('data_nasc');
            $table->string('idade');
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->enum('situacao', ['Em tratamento', 'Sem tratamento','Hormonioterapia','Falecido']);
            $table->enum('convenio', ['Convênio Particular', 'Outros']);
            $table->string('cep', 9)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('nome_social')->nullable();
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->string('cpf')->nullable();
            $table->enum('civil', ['Solteiro(a)', 'Casado(a)','Divorciado(a)','Viúvo(a)','União estável'])->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nome_rep')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
