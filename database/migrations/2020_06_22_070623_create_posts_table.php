<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');    
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->text('description');
            $table->text('content');
            $table->timestamp('published_at')->nullable();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('cookTimeFrom');
            $table->integer('cookTimeTo');
            $table->softDeletes();
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
