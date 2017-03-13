@extends('layouts.admin')



@section('content')

    <h1>Criar Post</h1>

        {{--
                Abrir o formulário com o método POST para poder usar o store do controller.
                    Consultar route:list
            --}}
            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true])  !!}


                {{-- O primeiro campo "name" tem de ser igual ao nome do atributo na Base de dados
                        tanto no label como no text. Aplica-se a todos os nomes dos campos dos
                        formularios. Ex. name, email, password, photo_id, role_id --}}
                <div class="form-group">
                    {!! Form::label('title','Título:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category: ') !!}
                    {!! Form::select('category_id',[''=>'Escolha a categoria'] + $categories, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo: ') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Conteúdo: ') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                </div>








                <div class="form-group">
                    {!! Form::submit('Criar Post', ['class'=>'btn btn-primary']) !!}
                </div>


            {!! Form::close() !!}

@include('includes.form_errors')
@endsection