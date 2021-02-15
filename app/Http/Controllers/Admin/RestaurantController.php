<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get data-Reastaurants from DB
        $restaurants = Restaurant::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
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

        //SALVO DATI A DB
        $data['user_id'] = Auth::id(); //attraverso AUTH generiamo lo slug del ristorante nella fase di autenticazione.

        $data['slug'] = Str::slug($data['name'], '-');

        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data);  //Facciamo fillable nel model!!!

        $saved = $newRestaurant->save();

        if($saved) {
            return redirect()->route('admin.restaurants.index');
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
            'name' => 'required | max: 100',
            // 'slug'=>notnull();
            'email' => 'required | max: 50',
            'phone_number' => 'required | max: 30',
            'vat_number' => 'required | max: 11',
            'address' => 'required | max: 50',
            'description' => 'required',
            'path_img' => 'image',
        ];
    }
}


