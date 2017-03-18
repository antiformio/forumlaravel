<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];


    public $directory = "/images/";




    public function getFileAttribute($value){


        return $this->directory . $value;

    }

    public function user(){

        return $this->hasOne('App\User');


    }

    public function post(){

        return $this->hasOne('App\Post');
    }


}
