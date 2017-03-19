@extends('layouts.admin')

@section('content')


    <h1>Comentário ao post <a href="{{route('home.post',$comment->post->id )}}">{{$comment->post->title}}</a></h1>


    <div class="row">



        <div class="col-sm-9">




            <div class="form-group">

                <p><b>ID: </b>{{$comment->id}}</p>
                <p><b>POST ID: </b> {{$comment->post->id}}</p>
                <p><b>Comentário: </b>{{$comment->body}}</p>
                <p><b>Estado: </b>{{$comment->is_active == 1 ? 'Activo' : 'Inactivo' }}</p>
                <p><b>Criado a: </b>{{$comment->created_at->diffForHumans()}}</p>


            </div>

            <div class="form-group">

                        {{--Caso o comentário esteja activo , então se clicar neste butão
                                o formulário leva para o método update o valor =0 do campo
                                is_active, ou seja, desactiva o comentário--}}
                        @if($comment->is_active == 1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]])  !!}

                                <input type="hidden" name="is_active" value="0">

                                    <div class="form-group">
                                        {!! Form::submit('Rejeitar', ['class'=>'btn btn-warning']) !!}
                                    </div>


                                {!! Form::close() !!}

                    {{--Caso o comentário esteja inactivo , então se clicar neste butão
                                    o formulário leva para o método update o valor =1 do campo
                                    is_active, ou seja, activa o comentário--}}
                        @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]])  !!}

                                <input type="hidden" name="is_active" value="1">

                                <div class="form-group">
                                    {!! Form::submit('Aceitar', ['class'=>'btn btn-success']) !!}
                                </div>


                                {!! Form::close() !!}


                        @endif

             </div>

            <div class="form-group">


                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]])  !!}



                            <div class="form-group">
                                {!! Form::submit('Apagar Comentário', ['class'=>'btn btn-danger']) !!}
                            </div>


                        {!! Form::close() !!}



            </div>
        </div>
    </div>




@endsection