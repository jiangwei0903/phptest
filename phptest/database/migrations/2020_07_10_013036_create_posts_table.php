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
            //自增id
            $table->bigIncrements('id');
            $table->string('titel',200)->default("");
            $table->string('content',2000)->default("");
            $table->string('creatorId',10)->default("");
            $table->integer('dianzan')->default(0);

            //timestamps函数会自动加入 created_at 和 updated_at字段
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
