<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [

        'post_id',
        'author',
        'email',
        'photo',
        'body',
        'is_active'

    ];


    public function replies(){

        return $this->hasMany('App\CommentReply');
    }

    public function post(){

        return $this->belongsTo('App\Post');

    }

    //Dado o atributo author (é uma string), vai buscar o objecto utilizador que lhe corresponde
    public function procuraAutor($autor){

        $user = User::where('name', $autor)->first();

        return $user;

    }
}
