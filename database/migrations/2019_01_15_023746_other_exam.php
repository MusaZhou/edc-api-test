<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('other_exams')) {
            Schema::drop('other_exams');
        }

        Schema::create('other_exams', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('Date')->nullable();
            $table->string('ExamName', 30)->nullable();
            $table->string('ExamExplain')->nullable();
            $table->string('Result')->nullable();
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
        Schema::drop('other_exams');
    }
}
