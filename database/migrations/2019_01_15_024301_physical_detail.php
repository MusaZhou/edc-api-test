<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhysicalDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('physical_details')) {
            Schema::drop('physical_details');
        }

        Schema::create('physical_details', function(Blueprint $table){
            $table->increments('id');
            $table->string('ItemName', 50)->nullable();
            $table->string('Explain')->nullable();
            $table->string('Result')->nullable();
            $table->string('Remarks')->nullable();
            $table->unsignedInteger('physical_id')->nullable();

            $table->foreign('physical_id')->references('id')->on('physicals');
            $table->index(['ItemName', 'physical_id']);

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
        Schema::drop('physical_details');
    }
}
