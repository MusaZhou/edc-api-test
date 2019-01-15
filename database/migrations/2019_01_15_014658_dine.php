<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('dines')) {
            Schema::drop('dines');
        }

        Schema::create('dines', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('CycleNo')->nullable();
            $table->unsignedSmallInteger('Type')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->unsignedInteger('ResidueCalories')->nullable();
            $table->string('ResidueRemarks')->nullable();
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
        Schema::drop('dines');
    }
}
