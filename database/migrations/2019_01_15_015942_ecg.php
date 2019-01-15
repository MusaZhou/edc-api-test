<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ecg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('ecg')) {
            Schema::drop('ecg');
        }

        Schema::create('ecg', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('PlanDate')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->string('Hr', 10)->nullable();
            $table->string('Pr', 10)->nullable();
            $table->string('Qrs', 10)->nullable();
            $table->string('Qt', 10)->nullable();
            $table->string('Rr', 10)->nullable();
            $table->string('Qtc', 10)->nullable();
            $table->string('QtcB', 10)->nullable();
            $table->string('QtcF', 10)->nullable();
            $table->unsignedTinyInteger('Cs')->nullable();
            $table->string('Remarks')->nullable();
            $table->dateTime('ReportDate')->nullable();
            $table->string('ReportResult')->nullable();
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
        Schema::drop('ecg');
    }
}
