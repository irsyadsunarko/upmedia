<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_name');
            $table->string('recipe_ingredients');
            $table->string('recipe_ingredients_quantity');
            $table->string('recipe_ingredients_unit');
            $table->string('recipe_food_portion');
            $table->string('recipe_video')->nullable();
            $table->string('recipe_how_to_cook');
            $table->string('recipe_picture');
            $table->string('recipe_cook_time');
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
        Schema::dropIfExists('recipe');
    }
}
