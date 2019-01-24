<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ae extends Migration
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
        
        Schema::create('ae', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 30)->nullable();
            $table->dateTime('SDate')->nullable();
            $table->char('Severity', 5)->nullable();
            $table->string('Feature')->nullable();
            $table->string('Action')->nullable();
            $table->unsignedTinyInteger('IsQuit')->nullable();
            $table->unsignedTinyInteger('IsSAE')->nullable();
            $table->dateTime('SRecordDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->string('LapseTo', 20)->nullable();
            $table->dateTime('LapseToDate')->nullable();
            $table->string('Relationship', 30)->nullable();
            $table->string('Remarks')->nullable();
            $table->dateTime('RecordDate')->index()->nullable();

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
        Schema::drop('ae');
    }
}
