<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     *
     * Um user tem um Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){

        return $this->hasOne('App\User');


    }
}
