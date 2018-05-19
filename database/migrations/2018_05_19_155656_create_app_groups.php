<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppGroups extends Migration
{
    public function up()
    {
        Schema::create("app_groups", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("token");
            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("user_id")->references("id")
                                      ->on("users");
        });
    }

    public function down()
    {
        Schema::dropIfExists("app_groups");
    }
}
