<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScreeningDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('screening_details')) {
            Schema::drop('screening_details');
        }

        Schema::create('screening_details', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedTinyInteger('Type')->nullable();
            $table->unsignedInteger('No')->nullable();
            $table->string('ItemName', 30)->nullable();
            $table->string('Result')->nullable();
            $table->unsignedInteger('screening_id')->nullable();

            $table->foreign('screening_id')->references('id')->on('screenings');
            $table->index(['Type', 'No', 'screening_id']);

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
        Schema::drop('screening_details');
    }
}
