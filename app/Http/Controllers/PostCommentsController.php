<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $data = [
            'post_id'   => $request->post_id,
            'author'    => $user->name,
            'email'     => $user->email,
            'photo'     => $user->photo->file,
            'body'      => $request->body

        ];
        if(Comment::create($data)){
            Session::flash('message', 'O comentário foi submetido com sucesso ! Aguarde confirmação do Administrador');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }else{
            Session::flash('message','Não foi submeter o comentário...');
            Session::flash('alert-class','alert-danger');
            return redirect()->back();
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $post = Post::findOrFail($id);

        $comments = $post->comments;

        return view('admin.comments.show', compact('comments','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Comment::findOrFail($id)->delete()){

            Session::flash('message','O comentário foi apagado !!!');
            Session::flash('alert-class','alert-danger');
            return redirect('/admin/comments');

        }else{
            Session::flash('message','Não foi possível apagar o comentário...');
            Session::flash('alert-class','alert-info');
            return redirect('/admin/comments');

        }


    }
}
