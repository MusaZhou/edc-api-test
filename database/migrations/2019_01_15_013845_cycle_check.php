<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CycleCheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cycle_checks')) {
            Schema::drop('cycle_checks');
        }

        Schema::create('cycle_checks', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('CycleNo')->nullable();
            $table->unsignedTinyInteger('IsPass')->nullable();
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
        Schema::drop('cycle_checks');
    }
}
