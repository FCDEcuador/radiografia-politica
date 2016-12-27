<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyTable extends Migration
{
    /**
     * Run the migrations.
     * @table study
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id');
            $table->string('profession', 45)->nullable();
            $table->integer('pregrade')->nullable();
            $table->integer('postgrad')->nullable();
            $table->integer('phd')->nullable();


            $table->foreign('profile_id', 'fk_study_profile1_idx')
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
       Schema::dropIfExists('study');
     }
}
