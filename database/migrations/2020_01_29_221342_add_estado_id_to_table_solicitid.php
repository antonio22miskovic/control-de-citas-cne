<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoIdToTableSolicitid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicituds', function (Blueprint $table) {

            $table->bigInteger('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicituds', function (Blueprint $table) {
            //
        });
    }
}
