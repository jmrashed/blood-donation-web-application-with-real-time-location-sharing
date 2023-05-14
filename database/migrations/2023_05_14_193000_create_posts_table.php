<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();     
            $table->unsignedBigInteger('post_author');
            $table->dateTime('post_date');
            $table->longText('post_content');
            $table->text('post_title');
            $table->string('post_status', 20)->default('publish');
            $table->string('comment_status', 20)->default('open');
            $table->string('post_slug', 300)->default('');
            $table->dateTime('post_modified');
            $table->unsignedBigInteger('post_parent')->default(0);
            $table->integer('menu_order')->default(0);
            $table->string('post_type', 20)->default('post');

            // Add foreign key constraints if needed
            // $table->foreign('post_author')->references('id')->on('users');
            // $table->foreign('post_parent')->references('id')->on('posts');
      
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
        Schema::dropIfExists('posts');
    }
}
