<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     * @table person
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('politicalParty_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->tinyInteger('type')->nullable();
            $table->string('img', 45)->nullable();
            $table->string('name', 45)->nullable();
            $table->string('lastname', 45)->nullable();
            $table->string('shortDescription', 500)->nullable();
            $table->text('description')->nullable();
            $table->string('plan', 45)->nullable();
            $table->string('twitter', 45)->nullable();
            $table->string('facebook', 45)->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('politicalParty_id', 'fk_person_politicalParty1_idx')
                ->references('id')->on('politicalParties');

            $table->foreign('state_id', 'fk_person_state1_idx')
                ->references('id')->on('states');

            $table->foreign('profile_id', 'fk_person_profile1_idx')
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
       Schema::dropIfExists('people');
     }
}
