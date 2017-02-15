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
            $table->string('profileMessage',255)->nullable();
            $table->string('SRIMessage',255)->nullable();
            $table->string('deputyMessage',255)->nullable();
            $table->string('companiesMessage',255)->nullable();
            $table->string('judicialMessage',255)->nullable();
            $table->string('penalMessage',255)->nullable();
            $table->string('senecytMessage',255)->nullable();
            $table->string('comptrollerMessage',255)->nullable();
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
          $table->dropColumn('profileMessage');
          $table->dropColumn('SRIMessage');
          $table->dropColumn('deputyMessage');
          $table->dropColumn('companiesMessage');
          $table->dropColumn('judicialMessage');
          $table->dropColumn('penalMessage');
          $table->dropColumn('senecytMessage');
          $table->dropColumn('comptrollerMessage');

        });
    }
}
