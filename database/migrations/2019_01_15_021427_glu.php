<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Glu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('glu')) {
            Schema::drop('glu');
        }

        Schema::create('glu', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->unsignedInteger('No')->nullable();
            $table->dateTime('PlanDate')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->unsignedDecimal('Value', 5, 2)->nullable();
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
        Schema::drop('glu');
    }
}
