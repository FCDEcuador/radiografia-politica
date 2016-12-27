<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJudicialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judicials', function (Blueprint $table) {
            $table->dropColumn(['administrative', 'civil', 'constitutional','penal','transit']);
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
        Schema::table('judicials', function (Blueprint $table) {
          $table->integer('administrative')->nullable();
          $table->integer('civil')->nullable();
          $table->integer('constitutional')->nullable();
          $table->integer('penal')->nullable();
          $table->integer('transit')->nullable();


          $table->dropForeign(['judgment_type_id']);
          $table->dropColumn('judgment_type_id');
        });
    }
}
