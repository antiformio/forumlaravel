<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Ir à BD buscar uma lista com o nome e o id (só precisamos de esses
         *      dois campos). O all() serve para trazer essa lista de volta.
         *
         * A estrutura da lista será key=>value, ou seja por exemplo:
         *              key=1 e value=administrador
         */
        $roles=Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input = $request->all();
        $input['password']=bcrypt($request->get('password'));

        // Se recebeu uma foto por parametro então usa essa
        if($file = $request->file('photo_id')){

            $name =time() . $file->getClientOriginalName(); //Adiciona a data ao nome da foto
            $file->move('images',$name);

            // Quando a foto é criada, ficamos automáticamente com um ID associado,
                // que podemos usar na linha de baixo
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }
        // Caso não tenha recebido, então usa a noImage
        else{

            $photo = Photo::where('file','noimage.jpg')->first();
            $input['photo_id']=$photo->id;

        }

        User::create($input);
        Session::flash('message', 'O user foi criado com sucesso !!!!');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles=Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name =time() . $file->getClientOriginalName(); //Adiciona a data ao nome da foto
            $file->move('images',$name);

            // Quando a foto é criada, ficamos automáticamente com um ID associado,
            // que podemos usar na linha de baixo
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $user->update($input);

        Session::flash('message', 'O user foi editado com sucesso !!!!');
        Session::flash('alert-class', 'alert-info');
        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Se a foto que o user tem for a noImage, não apagar!! só apaga se for diferente
        if($user->photo->file != '/images/noimage.jpg'){
            unlink(public_path() . $user->photo->file);
         }




        if($user->delete()){
            // Flash message para enviar para a ser mostrada na próxima página (neste caso em /admin/users)
            Session::flash('message', 'O user foi apagado com sucesso !!!!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/users');
        }

        // Se não apagou por alguma razao entao mostra o warning
        Session::flash('message', 'Ocorreu um erro ao apagar o user !!!!');
        Session::flash('alert-class', 'alert-warning');
        return redirect('/admin/users');
    }
}
