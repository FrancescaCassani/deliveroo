<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Genre;
use App\Restaurant;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {
            $newGenre = new Genre();

            $newGenre->type = $faker->randomElement(['Pizzeria', 'Piadineria', 'Gelateria', 'Indiano', 'Cinese', 'Giapponese', 'Messicano']);
            $newGenre->restaurant_id = $restaurant->id;

            $newGenre->save();
        }
    }
}
