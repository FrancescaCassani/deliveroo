<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //MASS ASSIGNMENT


    //Relazione del DB: USERS - RESTAURANT
<<<<<<< Updated upstream
    public function User() {
=======
    public function user() {
>>>>>>> Stashed changes
        return $this->belongsTo('App\User');
    }
}
