<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetasCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function ($table) {
            $table->string('meta_description')->after('estado');
            $table->string('meta_keywords')->after('estado');
            $table->string('slug')->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function ($table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('slug');
        }); 
    }
}
