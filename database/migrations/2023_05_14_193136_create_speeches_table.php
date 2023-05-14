<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speeches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('designation', 255);
            $table->text('description');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('updated_by')->references('id')->on('users');
       
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
        Schema::dropIfExists('speeches');
    }
}
