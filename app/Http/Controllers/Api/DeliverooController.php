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

        // (!empty($_GET[‘genre’])){
        //         $searchGenre = $_GET[‘genre’];
        //         $users = DB::table(‘genre_user’)
        //             ->join(‘users’, ‘users.id’, ‘=’, ‘genre_user.user_id’)
        //             ->join(‘genres’, ‘genres.id’, ‘=’, ‘genre_user.genre_id’)
        //             ->where(‘genres.genre_name’, $searchGenre)
        //             ->get();

        // $restaurants = DB::table('restaurant')
        // ->select('*')
        // ->join('genre_restaurant', 'genre_restaurant.restaurant_id', '=', 'restaurants.id')
        // ->join('genres', 'genres.id', '=', 'genre_restaurant.genre_id')
        // ->where('genres.type', '=', 'Pizzeria')->get();


        $restaurants = DB::table('genre_restaurant')
        ->join('restaurants', 'restaurants.id', '=', 'genre_restaurant.restaurant_id')
        ->join('genres', 'genres.id', '=', 'genre_restaurant.genre_id')
        ->where('genres.type', 'Pizzeria')
        ->orWhere('genres.type', 'Cinese')
        ->get();


        return response()->json($restaurants);
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
