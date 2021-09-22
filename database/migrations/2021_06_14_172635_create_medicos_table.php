<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->enum('tipo_p', ['Profissional de saúde', 'Agenda de procedimentos']);
            $table->enum('status', ['Ativo', 'Suspenso']);
            $table->string('n_conselho');
            $table->enum('conselho', 
            [
            'COREN|Conselho Federal de Enfermagem', 
            'CRAS|Conselho Regional de Assistência Social',
            'CREFITO|Conselho Regional de Fisioterapia e Terapia Ocupacional',
            'CRF|Conselho Regional de Farmácia',
            'CRFA|Conselho Regional de Fonoaudiologia',
            'CRM|Conselho Regional de Medicina',
            'CRN|Conselho Regional de Nutrição',
            'CRO|Conselho Regional de Odontologia',
            'CRP|Conselho Regional de Psicologia',
            'CRV|Conselho Regional de Medicina Veterinária',
            'OUT|Outros Conselhos'
            ]);
            $table->string('uf_conselho');
            $table->date('data_nasc');
            $table->string('cep', 9)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('email')->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->string('rg')->nullable();
            $table->string('emissor')->nullable();
            $table->enum('titulo', ['Dr.','Dr.(a)','Sr.','Sr.(a)']);
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
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
        Schema::dropIfExists('medicos');
    }
}
