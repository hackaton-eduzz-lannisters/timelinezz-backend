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
            $table->integer("product_id")->unsigned();
            $table->string("url");
            $table->string("additional_message");
            $table->bool("sponsored");
            
            $table->foreign("user_id")->references("id")
                ->on("users");
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
