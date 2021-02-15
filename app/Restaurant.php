<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //MASS ASSIGNMENT


    //Relazione del DB: USERS - RESTAURANT
    public function User() {
        return $this->belongsTo('App\User');
    }
}
