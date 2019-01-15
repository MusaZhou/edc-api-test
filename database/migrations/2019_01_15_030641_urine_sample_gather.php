<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrineSampleGather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('urine_sample_gathers')) {
            Schema::drop('urine_sample_gathers');
        }

        Schema::create('urine_sample_gathers', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo');
            $table->unsignedInteger('No')->nullable();
            $table->dateTime('SPlanDate')->nullable();
            $table->dateTime('EPlanDate')->nullable();
            $table->unsignedSmallInteger('Volumn')->nullable();
            $table->unsignedSmallInteger('Count')->nullable();
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
        Schema::drop('urine_sample_gathers');
    }
}
