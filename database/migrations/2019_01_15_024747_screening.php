<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Screening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('screenings')) {
            Schema::drop('screenings');
        }

        Schema::create('screenings', function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('ScreeningDate')->nullable();
            $table->tinyInteger('IsPass')->nullable();
            $table->string('ExclusionReasons')->nullable();
            $table->dateTime('RecordDate')->index()->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('screenings');
    }
}
