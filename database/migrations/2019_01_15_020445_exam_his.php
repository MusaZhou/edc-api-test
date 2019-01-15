<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamHis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('exam_his')) {
            Schema::drop('exam_his');
        }

        Schema::create('exam_his', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('ExamDate')->nullable();
            $table->dateTime('ReportDate')->nullable();
            $table->char('ItemName', 50)->nullable();
            $table->string('Result')->nullable();
            $table->string('Description')->nullable();
            $table->unsignedTinyInteger('Cs')->nullable();
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
        Schema::drop('exam_his');
    }
}
