<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InformedConsent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('informed_consents')) {
            Schema::drop('informed_consents');
        }

        Schema::create('informed_consents', function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('PreachDate')->index()->nullable();
            $table->string('QuestionAndAnswer')->nullable();
            $table->unsignedTinyInteger('IsSign')->nullable();
            $table->dateTime('SignDate')->nullable();

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
        Schema::drop('informed_consents');
    }
}
