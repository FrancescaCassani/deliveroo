<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::orderBy('name', 'asc')->get();

        return view('guests.home', compact('restaurants'));
    }
}
