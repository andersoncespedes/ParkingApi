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
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string("cedula", 60)->unique();
            $table->string("nombre", 60);
            $table->string("telefono", 60);
            $table->string("direccion", 200);
            $table->unsignedBigInteger("id_parroquia")->default(1);
            $table->foreign('id_parroquia')->references('id')->on('parroquia');
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
        Schema::dropIfExists('table_solicitantes');
    }
};
