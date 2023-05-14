<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateBloodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_bloods', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_place');
            $table->string('user_phone');
            $table->string('user_email');
            $table->date('last_donate_date');
            $table->text('disease');
            $table->string('donate_blood');
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
        Schema::dropIfExists('donate_bloods');
    }
}
