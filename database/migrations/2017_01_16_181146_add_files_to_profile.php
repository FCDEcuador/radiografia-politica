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
            $table->string('fileSri')->nullable();
            $table->string('fileHeritage')->nullable();
            $table->string('fileCompanies')->nullable();
            $table->string('fileJudicial')->nullable();
            $table->string('filePenal')->nullable();
            $table->string('fileStudy')->nullable();
            $table->string('fileComptroller')->nullable();
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
