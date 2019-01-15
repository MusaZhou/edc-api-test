<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SampleGather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('sample_gathers')) {
            Schema::drop('sample_gathers');
        }

        Schema::create('sample_gathers', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->unsignedTinyInteger('SampleType')->nullable();
            $table->unsignedInteger('No')->nullable();
            $table->dateTime('PlanDate')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->string('Remarks')->nullable();
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
        Schema::drop('sample_gathers');
    }
}
