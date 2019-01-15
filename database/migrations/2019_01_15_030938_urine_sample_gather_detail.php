<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrineSampleGatherDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('urine_sample_gather_details')) {
            Schema::drop('urine_sample_gather_details');
        }

        Schema::create('urine_sample_gather_details', function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->unsignedSmallInteger('Value')->nullable();
            $table->string('Remarks')->nullable();
            $table->dateTime('RecordDate')->nullable();
            $table->unsignedInteger('urine_sample_gather_id')->nullable();

            $table->foreign('urine_sample_gather_id')->references('id')->on('urine_sample_gathers');
            $table->index(['RecordDate', 'urine_sample_gather_id'], 'urine_sample_gather_detail_ru_index');

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
        Schema::drop('urine_sample_gather_details');
    }
}
