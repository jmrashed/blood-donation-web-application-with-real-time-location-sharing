<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('hospital')->nullable();
            $table->string('name')->nullable(); 
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('present_address')->nullable();
            $table->string('chamber_address')->nullable();
            $table->text('doctor_detail')->nullable();

            $table->foreignId('speciality_id')->constrained('doctor_specialities');
            $table->foreignId('designation_id')->constrained('doctor_designations');
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
        Schema::dropIfExists('doctors');
    }
}
