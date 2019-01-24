<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DrupCombination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('drug_combinations')) {
            Schema::drop('drug_combinations');
        }

        Schema::create('drug_combinations', function(Blueprint $table){
            $table->increments('id');
            $table->string('DrugName')->nullable();
            $table->string('Dose', 20)->nullable();
            $table->string('Frequency', 10)->nullable();
            $table->string('Route', 20)->nullable();
            $table->string('Reason')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('SRecordDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->string('Remarks')->nullable();
            $table->dateTime('RecordDate')->index()->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drug_combinations');
    }
}
