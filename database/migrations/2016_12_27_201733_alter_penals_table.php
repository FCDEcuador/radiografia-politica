<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPenalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penals', function (Blueprint $table) {
          $table->integer('judgment_type_id')->unsigned();

          $table->foreign('judgment_type_id')
              ->references('id')->on('judgment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penals', function (Blueprint $table) {
          $table->dropForeign(['judgment_type_id']);
          $table->dropColumn('judgment_type_id');
        });
    }
}
