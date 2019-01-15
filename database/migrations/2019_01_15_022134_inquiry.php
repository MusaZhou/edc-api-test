<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('inquiries')) {
            Schema::drop('inquiries');
        }

        Schema::create('inquiries', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedSmallInteger('RecordType')->nullable();
            $table->unsignedInteger('CycleNo')->nullable();
            $table->dateTime('Date')->nullable();
            $table->unsignedTinyInteger('IsPass')->nullable();
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
        Schema::drop('inquiries');
    }
}
