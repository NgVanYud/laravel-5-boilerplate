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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->integer('user_id')->default(0);
            $table->string('ava_path')->nullable();
            $table->integer('cate_id');
            $table->integer('views')->default(0);
            $table->string('slug');
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_public')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('posts');
    }
}
