<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFollows extends Migration
{
    public function up()
    {
        Schema::create("user_follows", function (Blueprint $table) {
            $table->integer("user_id")->unsigned();
            $table->integer("following_id")->unsigned();
            $table->foreign("user_id")->references("id")
                                      ->on("users");
            $table->foreign("following_id")->references("id")
                                       ->on("users");
            $table->primary(["user_id", "following_id"], "pk_user_follows");
        });
    }

    public function down()
    {
        Schema::dropIfExists("user_follows");
    }
}
