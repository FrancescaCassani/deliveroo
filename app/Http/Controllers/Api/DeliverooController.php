<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Food;
use App\Genre;

class DeliverooController extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();
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
