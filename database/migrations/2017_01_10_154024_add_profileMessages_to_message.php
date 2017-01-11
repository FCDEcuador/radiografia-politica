<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileMessagesToMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('profileMessage',125)->nullable();
            $table->string('SRIMessage',125)->nullable();
            $table->string('deputyMessage',125)->nullable();
            $table->string('companiesMessage',125)->nullable();
            $table->string('judicialMessage',125)->nullable();
            $table->string('penalMessage',125)->nullable();
            $table->string('senecytMessage',125)->nullable();
            $table->string('comptrollerMessage',125)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
          $table->string('profileMessage',125)->nullable();
          $table->string('SRIMessage',125)->nullable();
          $table->string('deputyMessage',125)->nullable();
          $table->string('companiesMessage',125)->nullable();
          $table->string('judicialMessage',125)->nullable();
          $table->string('penalMessage',125)->nullable();
          $table->string('senecytMessage',125)->nullable();
          $table->string('comptrollerMessage',125)->nullable();

        });
    }
}
