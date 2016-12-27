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
            $table->integer('profiles_id')->unsigned();
            $table->integer('houses')->nullable();
            $table->integer('cars')->nullable();
            $table->integer('money')->nullable();
            $table->integer('companies')->nullable();
            $table->date('previousDeclaration')->nullable();
            $table->float('previousAssets')->nullable();
            $table->float('previousLiabilities')->nullable();
            $table->float('previousHeritage')->nullable();
            $table->float('actualDeclaration')->nullable();
            $table->float('actualAssets')->nullable();
            $table->float('actualLiabilities')->nullable();
            $table->float('actualHeritage')->nullable();
            $table->timestamps();

            $table->foreign('profiles_id', 'fk_heritage_profile1_idx')
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
