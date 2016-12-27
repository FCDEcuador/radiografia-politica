<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptrollerTable extends Migration
{
    /**
     * Run the migrations.
     * @table comptroller
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptroller', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id');
            $table->integer('processes')->nullable();


            $table->foreign('profile_id', 'fk_comptroller_profile1_idx')
                ->references('id')->on('profile')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('comptroller');
     }
}
