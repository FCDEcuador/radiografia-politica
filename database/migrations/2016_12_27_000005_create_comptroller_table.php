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
        Schema::create('comptrollers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('processes')->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->foreign('profile_id', 'fk_comptroller_profile1_idx')
                ->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('comptrollers');
     }
}
