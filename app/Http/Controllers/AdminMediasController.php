<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{


    public function index(){


        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create(){

        return view('admin.media.create');

    }

    public function store(Request $request){

        $file = $request->file('file'); //Este campo 'file' não é o nosso campo file da base de dados.
                                        // é referente ao default field name que vem do dropzone.
                                        // Se se quiser mudar, ir à documentação do dropzone

        $name = time() . $file->getClientOriginalName();

        $file->move('images',$name);

        Photo::create(['file'=>$name]);


    }

    public function destroy($id){

        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        if($photo->delete()){

            Session::flash('message','Foto '.$photo->file. ' apagada com sucesso');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/media');

        }else{

            Session::flash('message', 'Ocorreu um erro ao apagar a Foto '.$photo->file);
            Session::flash('alert-class', 'alert-warning');
            return redirect('/admin/media');

        }




    }
}
