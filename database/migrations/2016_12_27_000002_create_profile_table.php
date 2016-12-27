<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     * @table profile
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('urlSri', 125)->nullable();
            $table->string('urlHeritage', 125)->nullable();
            $table->string('urlCompanies', 125)->nullable();
            $table->string('urlJudicial', 125)->nullable();
            $table->string('urlPenal', 125)->nullable();
            $table->string('urlStudy', 125)->nullable();
            $table->string('urlComptroller', 125)->nullable();
            $table->string('urlProfile', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('profile');
     }
}
