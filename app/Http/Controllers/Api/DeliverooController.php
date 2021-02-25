<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Food;
use App\Genre;
use Illuminate\Support\Facades\DB;

class DeliverooController extends Controller
{
    public function index() {

        $allRestaurants = Restaurant::all();
        $genres = Genre::all();
        if (!empty($_GET['genre'])) {
            $allRestaurants = [];
            $searchGenre = $_GET['genre'];
            foreach ($searchGenre as $genre) {
                $restaurants = DB::table('genre_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'genre_restaurant.restaurant_id')
                ->join('genres', 'genres.id', '=', 'genre_restaurant.genre_id')
                ->where('genres.type', '=', $genre)
                ->get();

                foreach ($restaurants as $el) {
                    // dd($el);
                    if (($searchGenre >= 2)) {
                        $allRestaurants = $restaurants;
                    }
                }
            }
        }
        $restaurants = DB::table('genre_restaurant')
        ->join('restaurants', 'restaurants.id', '=', 'genre_restaurant.restaurant_id')
        ->join('genres', 'genres.id', '=', 'genre_restaurant.genre_id')
        ->get();
        return response()->json($allRestaurants);

    }

    public function food() {
        $foods = Food::all();
        return response()->json($foods);
    }

    public function genre() {
        $genres = Genre::all();
        return response()->json($genres);
    }

}
