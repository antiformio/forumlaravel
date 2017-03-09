@extends('layouts.admin')


@section('content')

    <h1>Criar Utilizador</h1>

             {{--
                Abrir o formulário com o método POST para poder usar o store do controller.
                    Consultar route:list
            --}}
            {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true])  !!}

                <div class="form-group">
                    {!! Form::label('name','Nome:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'email: ') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Estado: ') !!}
                    {!! Form::select('is_active',[''=>'Estado do utilizador'] + array(1=>'Activo',0=>'Inactivo'), null, ['class'=>'form-control']) !!}
                 </div>

                    {{--
                        [''=>'Ecolha um Role para o user'] ----> para aparecer em pré-definido no formulário
                         + $roles ---->  para juntar os roles que fomos buscar à BD e mandamos para este form
                    --}}
                <div class="form-group">
                    {!! Form::label('role_id', 'Role: ') !!}
                    {!! Form::select('role_id',[''=>'Ecolha um Role para o user'] + $roles, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'Foto: ') !!}
                    {!! Form::file('file', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password: ') !!}
                    {!! Form::password('password', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Criar User', ['class'=>'btn btn-primary']) !!}
                </div>


            {!! Form::close() !!}

@include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}
@endsection

