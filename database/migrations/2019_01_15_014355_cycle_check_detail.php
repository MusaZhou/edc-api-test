<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CycleCheckDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cycle_check_details')) {
            Schema::drop('cycle_check_details');
        }

        Schema::create('cycle_check_details', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedTinyInteger('Type')->nullable();
            $table->unsignedInteger('No')->nullable();
            $table->string('ItemName')->nullable();
            $table->string('Result', 10)->nullable();
            $table->unsignedInteger('cycle_check_id')->nullable();

            $table->foreign('cycle_check_id')->references('id')->on('cycle_checks');
            $table->index(['Type', 'No', 'cycle_check_id']);

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
        Schema::drop('cycle_check_details');
    }
}
