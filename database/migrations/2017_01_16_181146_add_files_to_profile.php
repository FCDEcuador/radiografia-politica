<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilesToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('fileSri',255)->nullable();
            $table->string('fileHeritage',255)->nullable();
            $table->string('fileCompanies',255)->nullable();
            $table->string('fileJudicial',255)->nullable();
            $table->string('filePenal',255)->nullable();
            $table->string('fileStudy',255)->nullable();
            $table->string('fileComptroller',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
            $table->dropColumn(['fileSri', 'fileHeritage','fileCompanies','fileJudical','filePenal','fileStudy','fileComptroller']);
        });
    }
}
