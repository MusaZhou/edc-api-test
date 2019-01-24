<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VitalSign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('vital_signs')) {
            Schema::drop('vital_signs');
        }

        Schema::create('vital_signs', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->unsignedInteger('No')->nullable();
            $table->dateTime('PlanDate')->nullable();
            $table->dateTime('SDate')->nullable();
            $table->dateTime('EDate')->nullable();
            $table->string('Arm', 10)->nullable();
            $table->string('Sbp', 10)->nullable();
            $table->string('Dpb', 10)->nullable();
            $table->string('Pr', 10)->nullable();
            $table->string('R', 10)->nullable();
            $table->string('T', 10)->nullable();
            $table->string('Hr', 10)->nullable();
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
        Schema::drop('vital_signs');
    }
}
