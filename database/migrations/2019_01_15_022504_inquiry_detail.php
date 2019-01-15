<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InquiryDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('inquiry_details')) {
            Schema::drop('inquiry_details');
        }

        Schema::create('inquiry_details', function(Blueprint $table){
            $table->increments('id');
            $table->string('ItemName', 50)->nullable();
            $table->string('Explain')->nullable();
            $table->string('Result')->nullable();
            $table->string('Remarks')->nullable();
            $table->unsignedInteger('inquiry_id')->nullable();

            $table->foreign('inquiry_id')->references('id')->on('inquiries');
            $table->index(['ItemName', 'inquiry_id']);

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
        Schema::drop('inquiry_details');
    }
}
