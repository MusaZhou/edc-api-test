<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CheckIn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('check_ins')) {
            Schema::drop('check_ins');
        }

        Schema::create('check_ins', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('InRegDate')->nullable();
            $table->dateTime('InDate')->nullable();
            $table->string('InRemarks')->nullable();
            $table->dateTime('OutRegDate')->nullable();
            $table->dateTime('OutDate')->nullable();
            $table->string('OutRemarks')->nullable();

            $table->index(['CycleNo', 'InRegDate']);
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
        Schema::drop('check_ins');
    }
}
