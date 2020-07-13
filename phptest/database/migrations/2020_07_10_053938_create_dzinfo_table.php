<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDzinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dzinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('postsid')->default(0);
            $table->integer('userid')->default(0);

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
        Schema::dropIfExists('dzinfo');
    }
}
