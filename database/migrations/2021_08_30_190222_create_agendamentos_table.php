<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->enum('tipo_a', ['Consulta', 'Exame']);
            $table->string('data');
            $table->time('hora')->nullable();
            $table->enum('consult', ['Consultório 1', 'Consultório 2', 'Consultório 3', 'Consultório 4','Consultório 5']);
            $table->text('observacao')->nullable();
            $table->decimal('preco')->nullable();
            $table->enum('status', ['Atendimento finalizado', 'A ser atendido', 'Atendimento cancelado']);
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
        Schema::dropIfExists('agendamentos');
    }
}
