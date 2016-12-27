<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSriTable extends Migration
{
    /**
     * Run the migrations.
     * @table sri
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sri', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->string('year', 4)->nullable();
            $table->tinyInteger('taxType')->nullable();
            $table->float('value')->nullable();
            $table->timestamps();

            $table->foreign('profile_id', 'fk_sri_profile_idx')
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
       Schema::dropIfExists('sri');
     }
}
