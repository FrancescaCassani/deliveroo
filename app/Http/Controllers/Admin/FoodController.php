<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get data-Restaurants/Foods from DB
        $restaurants = Restaurant::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $foods = Food::where('restaurant_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.foods.index', compact('restaurants', 'foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //VALIDAZIONE
        $request->validate($this->ruleValidation());

        // Salvare immagine in locale
        if(!empty($data['path_img'])){
            $data['path_img'] = Storage::disk('public')->put('images' , $data['path_img']);
        }

        //SALVO DATI A DB
        $data['restaurant_id'] = Auth::id(); //attraverso AUTH generiamo lo slug del ristorante nella fase di autenticazione.

        $data['slug'] = Str::slug($data['name'], '-');

        $newFood = new Food();
        $newFood->fill($data);  //Facciamo fillable nel model!!!

        $saved = $newFood->save();

        if($saved) {
            return redirect()->route('admin.foods.index');
        } else {
            return redirect()->route('admin.home');
        } //DA RIVEDERE ERRORS...
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //UTILITY FUNCTIONS
    private function ruleValidation() {
        return [
            //QUA STABILIAMO LE INFO RICHIESTE PER PROCEDERE
            'name' => 'required | max: 200',
            // 'slug'=>notnull();
            'description' => 'required',
            'ingredients' => 'required | max: 255',
            'price' => 'required',
            'visibility' => 'required',
            'path_img' => 'image',
        ];
    }
}
