<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistory extends Migration
{
    public function up()
    {
        Schema::create("histories", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->integer("action_id")->unsigned();
            $table->integer("product_id")->unsigned()->nullable();
            $table->integer("link_id")->unsigned()->nullable();
            $table->string("additional_message")->nullable();
            $table->boolean("sponsored")->default(false);
            
            $table->foreign("user_id")->references("id")
                ->on("users");
            $table->foreign("link_id")->references("id")
                ->on("links");
            $table->foreign("action_id")->references("id")
                ->on("actions");
            $table->foreign("product_id")->references("id")
                ->on("products");
            
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists("histories");
    }
}
