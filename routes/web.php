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



//----------------------------------------------------------------------------------------------------------------------
//ROTAS PARA O USER NÃO AUTENTICADO
//----------------------------------------------------------------------------------------------------------------------
// Página inicial
/*
Route::get('/',function(){

    return view('index-blog');


});*/


Route::get('/', function(){
    $posts = Post::orderBy('id','desc')->take(4)->get();
    return view('entrada',compact('posts'));

});

// Página do blog
Route::get('/blog', function(){

    $posts = Post::orderBy('id','desc')->Paginate(2);
    $categories = Category::all();
    return view('welcome', compact('posts','categories'));

})->name('home.welcome');




Route::get('/post/{id}','AdminPostsController@post')->name('home.post');
Route::get('/post/tag/{tag}','AdminPostsController@getPostsByTag')->name('tagged.posts');




//----------------------------------------------------------------------------------------------------------------------
//ROTAS PARA USER LOGADO QUE NÃO É ADMINISTRADOR (PARA PODER COMENTAR E RESPONDER A COMENTÁRIOS)
//----------------------------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'auth'],function (){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});





//----------------------------------------------------------------------------------------------------------------------
//ROTAS DE AUTENTICAÇÃO (LOGIN/LOGOUT/ETC)
//----------------------------------------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home','HomeController@index');

Route::get('/logout','Auth\LoginController@logout');







//----------------------------------------------------------------------------------------------------------------------
//ROTAS PARA O ADMINISTRADOR
//----------------------------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'admin'],function (){

    Route::get('/admin', function (){

        return view('admin.index');


    })->name('admin.index');



    Route::resource('admin/users', 'AdminUsersController',['names'=>[

        //Nome do método do controller => nome da view
        'index'=>'admin.users.index',
        'show'=>'admin.users.show',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',

    ]]);
    Route::resource('admin/posts','AdminPostsController',['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',




    ]]);
    Route::resource('admin/categories','AdminCategoriesController',['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',




    ]]);


    Route::resource('admin/media','AdminMediasController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',




    ]]);



    Route::resource('admin/comments','PostCommentsController',['names'=>[

        'index'=>'admin.comments.index',
        'show'=>'admin.comments.show',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',




    ]]);
    Route::resource('admin/comments/replies','CommentRepliesController',['names'=>[

        'index'=>'admin.comments.replies.index',
        'show'=>'admin.comments.replies.show',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit',




    ]]);



});