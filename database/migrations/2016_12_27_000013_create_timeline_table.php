<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelineTable extends Migration
{
    /**
     * Run the migrations.
     * @table timeline
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->tinyInteger('typeEvent')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('shortDescription', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('person_id', 'fk_timeline_person1_idx')
                ->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('timelines');
     }
}
