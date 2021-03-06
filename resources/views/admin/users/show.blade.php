@extends('layouts.admin')

@section('content')

    <h1>Utilizador {{$user->name}}</h1>


    <div class="row">

        <div class="col-sm-3">
            @if($user->photo->file)
            <img src="{{$user->photo->file}}" alt=""
                 class="img-responsive img-rounded">
            @endif
        </div>

        <div class="col-sm-9">




            <div class="form-group">

                <p><b>Nome: </b>{{$user->name}}</p>
                <p><b>Email: </b> {{$user->email}}</p>
                <p><b>Estado: </b>{{$user->is_active == 1 ? 'Activo' : 'Inactivo' }}</p>
                <p><b>Role: </b> {{$user->role ? $user->role->name : 'O user não tem Role'}}</p>





            </div>
        </div>
    </div>

    @include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}

@endsection
