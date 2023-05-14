<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedBloodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_bloods', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 255);
            $table->string('user_phone', 255);
            $table->string('user_email', 255);
            $table->string('user_blood', 255);
            $table->string('user_place', 255);
            $table->string('patient_name', 255);
            $table->string('patient_place', 255);
            $table->integer('number_blood_bag');
            $table->text('disease');
            $table->string('relation', 255);
            $table->time('opration_time');
            $table->unsignedBigInteger('created_by');

            $table->foreign('created_by')->references('id')->on('users');
      
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
        Schema::dropIfExists('need_bloods');
    }
}
