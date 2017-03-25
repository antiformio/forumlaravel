<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;


    /**
     * Sluggable configuration.
     *
     * @var array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source'         => 'title'

            ]
        ];
    }



    protected $fillable = ['title','body','photo_id','category_id'];


    /**
     *
     * Um Post tem um user (pertence a um user)
     *
     * QUANDO SE USA belongsTo BASICAMENTE ESTAMOS A DIZER QUE A TABELA POST TEM DE TER UM user_id
     *
     *
     */
    public function user(){

        return $this->belongsTo('App\User');
    }

    /**
     *
     * Um Post tem uma foto (pertence a um foto)
     *
     * QUANDO SE USA belongsTo BASICAMENTE ESTAMOS A DIZER QUE A TABELA POST TEM DE TER UM photo_id
     *
     *
     */
    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    /**
     *
     * Um Post tem uma categoria (pertence a um categoria)
     *
     * QUANDO SE USA belongsTo BASICAMENTE ESTAMOS A DIZER QUE A TABELA POST TEM DE TER UM category_id
     *
     *
     */
    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function comments(){

        return $this->hasMany('App\Comment');


    }
}
