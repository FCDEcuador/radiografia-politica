<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPositionToPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->boolean('is_candidate');
            $table->integer('position_id')->unsigned();

            $table->foreign('position_id')
                ->references('id')->on('positions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('is_candidate');
            $table->string('type',4);

            $table->dropForeign(['position_id']);
            $table->dropColumn('position_id');
        });
    }
}
