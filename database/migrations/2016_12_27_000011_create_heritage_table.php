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
        Schema::create('heritage', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
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

            $table->foreign('profile_id', 'fk_heritage_profile1_idx')
                ->references('id')->on('profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('heritage');
     }
}
