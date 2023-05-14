<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->string('email', 200)->nullable();
            $table->text('password');
            $table->string('gender', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('last_donate_date')->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('division_id');
            $table->string('district', 200)->nullable();
            $table->string('upazila', 200)->nullable();
            $table->text('location')->nullable();
            $table->string('blood_group', 20)->nullable();
            $table->string('post_code', 30)->nullable();
            $table->integer('rank')->nullable();
            $table->text('web_url')->nullable();
            $table->text('fb_url')->nullable();
            $table->text('profile_photo')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->integer('verification')->nullable();
            $table->double('lastLat')->nullable();
            $table->double('lastLng')->nullable();
            $table->string('fcm_email', 255)->nullable();
            $table->string('fcm_uid', 255)->nullable();
            $table->string('fcm_token', 255)->nullable();
            $table->string('age', 255)->nullable();
            $table->string('pro_visible', 255)->nullable();
            $table->string('called_date', 255)->nullable();
            $table->string('called_today', 255)->nullable();
            $table->string('religion', 255)->nullable();
            $table->string('is_physically_disabled', 255)->nullable();
            $table->string('nationality', 255)->nullable();
            $table->string('nid', 255)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('varification', 20)->nullable();
            $table->integer('number_of_donate')->nullable();
            $table->timestamps();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
