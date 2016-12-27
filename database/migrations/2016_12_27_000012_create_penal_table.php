<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenalTable extends Migration
{
    /**
     * Run the migrations.
     * @table penal
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id');
            $table->string('total', 45)->nullable();


            $table->foreign('profile_id', 'fk_penal_profile1_idx')
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
       Schema::dropIfExists('penal');
     }
}
