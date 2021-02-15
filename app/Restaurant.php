<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //MASS ASSIGNMENT
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'vat_number',
        'address',
        'description',
        'path_img',
        'slug',
    ];


    //Relazione del DB: USERS - RESTAURANT
    public function User() {
        return $this->belongsTo('App\User');
    }
}
