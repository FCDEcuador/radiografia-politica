<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaPosition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla categoria_position
        if(!Schema::hasTable('categoria_position')){
            Schema::create('categoria_position', function($table){
                $table->integer('categoria_id')->unsigned();
                $table->integer('position_id')->unsigned();
                $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
                $table->foreign('position_id')->references('id')->on('positions')->onDelete('restrict')->onUpdate('restrict');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_position');
    }
}
