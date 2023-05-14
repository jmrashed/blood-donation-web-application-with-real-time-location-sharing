<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade');
            $table->string('school_name')->nullable();
            $table->integer('school_passing_year')->nullable();
            $table->string('school_passing_degree')->nullable();
            $table->double('school_passing_result')->nullable();
            $table->string('college_name')->nullable();
            $table->integer('college_passing_year')->nullable();
            $table->string('college_passing_degree')->nullable();
            $table->double('college_passing_result')->nullable();
            $table->string('university_name')->nullable();
            $table->string('university_department')->nullable();
            $table->string('university_passing_degree')->nullable();
            $table->integer('university_passing_year')->nullable();
            $table->double('university_passing_result')->nullable();
            $table->string('donor_father_name')->nullable();
            $table->string('donor_mother_name')->nullable();
            $table->string('donor_birth_place')->nullable();
            $table->string('donor_religion')->nullable();
            $table->string('donor_is_physically_disabled')->nullable();
            $table->text('donor_is_physically_problem')->nullable();
            $table->string('donor_nationality')->nullable();
            $table->string('donor_birthcertificateno')->nullable();
            $table->string('donor_occupation')->nullable();
            $table->string('donor_nid')->nullable();
            $table->string('donor_emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
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
        Schema::dropIfExists('donor_details');
    }
}
