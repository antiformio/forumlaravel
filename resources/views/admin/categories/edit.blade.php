@extends('layouts.admin')
@section('content')



        @include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}


<div class="row">

    <h1>Editar Categoria</h1>
    <div class="col-sm-6">

        {{--
                Abrir o formulário com o método POST para poder usar o store do controller.
                    Consultar route:list
            --}}
        {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]])  !!}


        {{-- O primeiro campo "name" tem de ser igual ao nome do atributo na Base de dados
                tanto no label como no text. Aplica-se a todos os nomes dos campos dos
                formularios. Ex. name, email, password, photo_id, role_id --}}
        <div class="form-group">
            {!! Form::label('name','Nome da categoria:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Editar Categoria', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>


        {!! Form::close() !!}
        {{--
                                 Abrir o formulário com o método DELETE para poder usar o destroy do controller.
                                   Consultar route:list
                               --}}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]])  !!}

        <div class="form-group">

            {!! Form::submit('Apagar Categoria', ['class'=>'btn btn-danger col-sm-6']) !!}

        </div>




        {!! Form::close() !!}
    </div>









</div>




    @endsection