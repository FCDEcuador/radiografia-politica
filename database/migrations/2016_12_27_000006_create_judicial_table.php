<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudicialTable extends Migration
{
    /**
     * Run the migrations.
     * @table judicial
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judicial', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('profile_id')->unsigned();
            $table->integer('administrative')->nullable();
            $table->integer('civil')->nullable();
            $table->integer('constitutional')->nullable();
            $table->integer('penal')->nullable();
            $table->integer('transit')->nullable();
            $table->timestamps();

            $table->foreign('profile_id', 'fk_judicial_profile1_idx')
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
       Schema::dropIfExists('judicial');
     }
}
