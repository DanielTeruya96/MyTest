<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvaQuestaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_questao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('prova_id')->unsigned()->nullable();
            $table->foreign('prova_id')->references('id')->on('provas')->onDelete('cascade');
            $table->bigInteger('questao_id')->unsigned()->nullable();
            $table->foreign('questao_id')->references('id')->on('questaos')->onDelete('cascade');
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
        Schema::dropIfExists('prova_questao');
    }
}
