<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FaecesSampleGather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('faeces_sample_gathers')) {
            Schema::drop('faeces_sample_gathers');
        }

        Schema::create('faeces_sample_gathers', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->unsignedDecimal('WetWeight', 5, 2)->nullable();
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
        Schema::drop('faeces_sample_gathers');
    }
}
