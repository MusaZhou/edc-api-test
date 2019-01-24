<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('labs')) {
            Schema::drop('labs');
        }

        Schema::create('labs', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('GatherDate')->nullable();
            $table->dateTime('ReceiveDate')->nullable();
            $table->dateTime('ReportDate')->nullable();
            $table->string('ClassifyCode', 20)->nullable();
            $table->string('ClassifyName', 50)->nullable();
            $table->string('ItemCode', 30)->nullable();
            $table->string('ItemName', 50)->nullable();
            $table->string('ItemEName', 20)->nullable();
            $table->string('Result')->nullable();
            $table->char('Unit', 10)->nullable();
            $table->string('Reference', 30)->nullable();
            $table->unsignedTinyInteger('Cs')->nullable();
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
        Schema::drop('labs');
    }
}
