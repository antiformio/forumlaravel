@extends('layouts.admin')

@section('content')

    <h1>Editar Utilizador</h1>


    <div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : '/images/noimage.jpg'}}" alt=""
                 class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">


            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nome: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                {!! Form::label('email', 'Email: ') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}

                {{--{!! Form::label('password', 'Password: ') !!}
                {!! Form::password('password', null, ['class'=>'form-control']) !!}--}}

                {!! Form::label('is_active', 'Estado: ') !!}
                {!! Form::select('is_active', array(1=>'Activo',0=>'Inactivo'), null, ['class'=>'form-control']) !!}


                {!! Form::label('role_id', 'Role: ') !!}
                {!! Form::select('role_id',$roles, null, ['class'=>'form-control']) !!}

                {!! Form::label('photo_id', 'Foto: ') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

                <div class="col-sm-6">
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}


                    {!! Form::close() !!}


                    {{--
                                    Abrir o formulário com o método DELETE para poder usar o store do controller.
                                      Consultar route:list
                                  --}}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]])  !!}


                    {!! Form::submit('Apagar User', ['class'=>'btn btn-danger col-sm-6']) !!}



                    {!! Form::close() !!}


                </div>

            </div>
        </div>

    @include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}

@endsection