<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Category;
use App\Post;

// Página inicial que leva todos os posts por ordem descrescente de ID's e todas as categorias
Route::get('/', function(){

    $posts = Post::orderBy('id','desc')->simplePaginate(2);
    $categories = Category::all();
    return view('welcome', compact('posts','categories'));

})->name('home.welcome');

Route::auth();

Route::get('/home', 'HomeController@index');

// Dar um nome à route (home.post) e dizer que usa aquele controller
Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);




//Rotas para o administrator
Route::group(['middleware'=>'admin'],function (){

    Route::get('/admin', function (){

        return view('admin.index');


    })->name('admin.index');

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');
    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comments/replies','CommentRepliesController');



});

//Rotas para o utilizador logado que não é administrator
Route::group(['middleware'=>'auth'],function (){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});


