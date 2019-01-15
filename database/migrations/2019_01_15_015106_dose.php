<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('doses')) {
            Schema::drop('doses');
        }

        Schema::create('doses', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('CycleNo')->nullable();
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
        Schema::drop('doses');
    }
}
