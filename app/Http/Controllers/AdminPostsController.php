<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;




        if($file = $request->file('photo_id')){

            $name =time() . $file->getClientOriginalName(); //Adiciona a data ao nome da foto
            $file->move('images',$name);

            // Quando a foto é criada, ficamos automáticamente com um ID associado,
            // que podemos usar na linha de baixo
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }


        if($user->posts()->create($input)){
            Session::flash('message', 'O Post foi inserido com sucesso!!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/posts');
        }

        Session::flash('message', 'Ocorreu um erro ao gravar o Post...');
        Session::flash('alert-class', 'alert-warning');
        return redirect('/admin/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $categories = Category::lists('name','id')->all();


        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, $id)
    {
        $user = Auth::user();
        $input = $request->all();
        $post = Post::findOrFail($id);


        if($file = $request->file('photo_id')){

            $name =time() . $file->getClientOriginalName(); //Adiciona a data ao nome da foto
            $file->move('images',$name);

            // Quando a foto é criada, ficamos automáticamente com um ID associado,
            // que podemos usar na linha de baixo
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }

        /**
         * Vai buscar os posts do user que está logado, e que o id é igual ao do post que recebe por parametro
         *  e first() vai buscar esse primeiro (e unico ) elemento.
         *
         * Caso não exista, quer dizer que o user que está ligado, não tem nenhum post cujo post id seja igual ao
         *  que recebemos por parametro - ou seja, não é seu
         */
        if($user->posts()->whereId($id)->first() != null){
            $user->posts()->whereId($id)->first()->update($input);
            Session::flash('message', 'O Post foi Editado com sucesso!!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/posts');

        }
        // Se o user autenticado não é o dono do post então lançamos uma flash message
        if($post->user_id != $user->id){

            Session::flash('message', 'Não tem permições para alterar este post...');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/posts');

        }

        // Se por alguma razão não conseguimos editar o post e o user é o dono, então lançamos um alerta
        Session::flash('message', 'Ocorreu um erro ao gravar o Post...');
        Session::flash('alert-class', 'alert-warning');
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}