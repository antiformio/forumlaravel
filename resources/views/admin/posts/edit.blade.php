@extends('layouts.admin')

@section('content')

    <h1>Editar Post</h1>


    <div class="row">

        <div class="col-sm-3">

            <img src="{{$post->photo ? $post->photo->file : '/images/noimage.jpg'}}" alt=""
                 class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">


            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('user_id', 'User : ') !!}


                {!! Form::label('category_id', 'Categoria : ') !!}
                {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}

                {!! Form::label('photo_id', 'Foto: ') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}


                {!! Form::label('title', 'Título: ') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}

                {!! Form::label('body', 'Conteúdo : ') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

                <div class="form-group">
                    {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}


                    {!! Form::close() !!}


                    {{--
                                    Abrir o formulário com o método DELETE para poder usar o destroy do controller.
                                      Consultar route:list
                                  --}}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])  !!}


                    {!! Form::submit('Apagar Post', ['class'=>'btn btn-danger col-sm-6']) !!}



                    {!! Form::close() !!}


                </div>

            </div>
        </div>
    </div>

    @include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}

@endsection