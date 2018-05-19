<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAction extends Migration
{
    public function up()
    {
        Schema::create("actions", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("tag");
            $table->string("template");
            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(["tag", "user_id"], "idx_unq_tag");
            $table->foreign("user_id")->references("id")
                                      ->on("users");
        });
    }

    public function down()
    {
        Schema::dropIfExists("actions");
    }
}
