<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subjectinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('subject_infos')) {
            Schema::drop('subject_infos');
        }

        Schema::create('subject_infos', function(Blueprint $table){
            $table->increments('id');
            $table->string('Code')->unique()->nullable();
            $table->string('ScreenNumber')->nullable();
            $table->dateTime('RegisterDate')->nullable();
            $table->dateTime('JoinDate')->nullable();
            $table->char('GroupName', 100)->nullable();
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('EndDate')->nullable();
            $table->string('Initial')->nullable();
            $table->char('Gender', 4)->nullable();
            $table->date('Birthday')->nullable();
            $table->unsignedSmallInteger('Age')->nullable();
            $table->string('Nation', 20)->nullable();
            $table->string('Race', 20)->nullable();
            $table->string('Job', 20)->nullable();
            $table->string('Marital', 10)->nullable();

            $table->softDeletes();
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
        Schema::drop('subject_infos');
    }
}
