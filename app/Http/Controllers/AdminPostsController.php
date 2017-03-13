<?php

namespace App\Http\Controllers;

use App\Category;
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
        return view('admin.posts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
