<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliticalpartyTable extends Migration
{
    /**
     * Run the migrations.
     * @table politicalParty
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politicalParty', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->string('img', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('politicalParty');
     }
}
