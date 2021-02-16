<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //MASS ASSIGNMENT


    //Relazione del DB: FOODS - RESTAURANT
    public function Restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
}
