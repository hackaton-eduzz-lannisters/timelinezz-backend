<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    public function up()
    {
        Schema::create("products", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("image");
            $table->integer("user_id")->unsigned();
            $table->string("url");
            $table->unique(["url", "user_id"], "idx_unq_url");
            $table->foreign("user_id")->references("id")
                ->on("users");
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists("products");
    }
}
