<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public $directory = "/images/";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     *
     * Um user tem um role (pertence a um role)
     *
     * QUANDO SE USA belongsTo BASICAMENTE ESTAMOS A DIZER QUE A TABELA USERS TEM DE TER UM role_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){

        return $this->belongsTo('App\Role');

    }


    /**
     *
     * Um user tem uma foto (pertence a uma foto)
     *
     * QUANDO SE USA belongsTo BASICAMENTE ESTAMOS A DIZER QUE A TABELA USERS TEM DE TER UM photo_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo(){


        return $this->belongsTo('App\Photo');

    }




    /**
     * Método a ser usado pelo Admin middleware.
     *
     * Retorna true se o user é administrator E activo , false se não é
     */
    public function isAdmin(){
        if($this->role){
            if($this->role->name == 'administrator' && $this->is_active == 1){
                return true;
            }
            return false;
        }
        return false;


    }

    /**
     * Um user tem vários Posts....
     */
    public function posts(){

        return $this->hasMany('App\Post');

    }

    /**
     * getGravatarAttribute constroi um link com o email do user (codificado com md5)
     *      e atravez desse email codificado vai ao site do gravatar buscar a imagem
     *      associada ao perfil do utilizador
     *
     *      "?d=mm" é o mistery man, ou seja caso não haja uma foto associada, responde
     *          com uma foto default do mistery man
     */
    public function getGravatarAttribute(){

        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm";
        return "http://www.gravatar.com/avatar/$hash";


    }

}
