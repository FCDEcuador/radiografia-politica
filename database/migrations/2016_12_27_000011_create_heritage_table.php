<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeritageTable extends Migration
{
    /**
     * Run the migrations.
     * @table heritage
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heritages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('houses')->nullable();
            $table->integer('cars')->nullable();
            $table->integer('money')->nullable();
            $table->integer('companies')->nullable();
            $table->date('previousDeclaration')->nullable();
            $table->double('previousAssets',8,2)->nullable();
            $table->double('previousLiabilities',8,2)->nullable();
            $table->double('previousHeritage',8,2)->nullable();
            $table->double('actualDeclaration',8,2)->nullable();
            $table->double('actualAssets',8,2)->nullable();
            $table->double('actualLiabilities',8,2)->nullable();
            $table->double('actualHeritage',8,2)->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('profile_id', 'fk_heritage_profile1_idx')
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
       Schema::dropIfExists('heritages');
     }
}
