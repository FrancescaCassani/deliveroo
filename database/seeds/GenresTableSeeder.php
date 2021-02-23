<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Pizzeria',
            'Piadineria',
            'Gelateria',
            'Indiano',
            'Cinese',
            'Giapponese',
            'Messicano',
        ];

        foreach ($genres as $genre) {
            $newGenre = new Genre();
            $newGenre->type = $genre;
            $newGenre->save();
        }
    }
}
