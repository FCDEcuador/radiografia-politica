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
        Schema::create('person', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('politicalParty_id');
            $table->integer('state_id');
            $table->integer('profile_id');
            $table->tinyInteger('type')->nullable();
            $table->string('img', 45)->nullable();
            $table->string('name', 45)->nullable();
            $table->string('lastname', 45)->nullable();
            $table->string('shortDescription', 500)->nullable();
            $table->text('description')->nullable();
            $table->string('plan', 45)->nullable();
            $table->string('twitter', 45)->nullable();
            $table->string('facebook', 45)->nullable();


            $table->foreign('politicalParty_id', 'fk_person_politicalParty1_idx')
                ->references('id')->on('politicalParty')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_id', 'fk_person_state1_idx')
                ->references('id')->on('state')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('profile_id', 'fk_person_profile1_idx')
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
       Schema::dropIfExists('person');
     }
}
