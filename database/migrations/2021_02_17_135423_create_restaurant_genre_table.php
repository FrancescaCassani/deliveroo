<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('genre_id');

            //Relazione RESTAURANT - GENRE
            $table->foreign('restaurant_id')
            ->references('id')
            ->on('restaurants');

            //Relazione GENRE - RESTAURANT
            $table->foreign('genre_id')
            ->references('id')
            ->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_genre');
    }
}
