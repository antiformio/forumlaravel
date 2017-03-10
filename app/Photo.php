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


}
