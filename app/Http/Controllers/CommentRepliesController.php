<?php

namespace App\Http\Controllers;

use App\CommentReply;
use App\Http\Requests\RepliesRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }


    public function createReply(RepliesRequest $request){

        $user = Auth::user();
        $data = [
            'comment_id'   => $request->comment_id,
            'author'    => $user->name,
            'email'     => $user->email,
            'photo'     => $user->photo->file,
            'body'      => $request->body

        ];
        if(CommentReply::create($data)){
            Session::flash('message', 'A resposta foi submetida com sucesso ! Aguarde confirmação do Administrador');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }else{
            Session::flash('message','Não foi submeter a resposta...');
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
