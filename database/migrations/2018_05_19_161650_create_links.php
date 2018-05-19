<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinks extends Migration
{
    public function up()
    {
        Schema::create("links", function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->string("description");
            $table->string("image");
            $table->string("url");
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists("links");
    }
}
