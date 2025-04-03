<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->date("fecha");
            $table->string("asunto", 200);
            $table->unsignedBigInteger("id_solicitante")->default(1);
            $table->foreign('id_solicitante')->references('id')->on('solicitantes');
            $table->unsignedBigInteger("id_funcionario")->default(1);
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->unsignedBigInteger("id_oficio")->default(1);
            $table->foreign('id_oficio')->references('id')->on('oficio');
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
        Schema::dropIfExists('solicitudes');
    }
};
