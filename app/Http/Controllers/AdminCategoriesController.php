<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Category::create($request->all())){
            Session::flash('message', 'A Categoria foi criada com sucesso!!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/categories');
        }else{
            Session::flash('message','Não foi possível criar a categoria...');
            Session::flash('alert-class','alert-warning');
            return redirect('/admin/categories');
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
        $category = Category::findOrFail($id);

        return view('admin.categories.edit',compact('category'));
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
        $category = Category::findOrFail($id);


        if($category->update($request->all())){
            Session::flash('message', 'A categoria foi editada com sucesso !!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/categories');
        }else{
            Session::flash('message','Não foi possível editar a categoria...');
            Session::flash('alert-class','alert-danger');
            return redirect('/admin/categories');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if($category->delete()){

            Session::flash('message', 'A categoria foi apagada com sucesso !!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/categories');

        }else{
            Session::flash('message','Não foi possível apagar a categoria...');
            Session::flash('alert-class','alert-danger');
            return redirect('/admin/categories');
        }
    }
}
