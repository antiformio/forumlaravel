@extends('layouts.admin')

@section('content')





    @if(count($replies) > 0)



        <h1>Todos as respostas</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Post</th>
            </tr>
            </thead>


            <tbody>

            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{ route('home.post', $reply->comment->post->id) }}">Ver Post</a></td>

                    <td>

                        {{--Caso o comentário esteja activo , então se clicar neste butão
                                o formulário leva para o método update o valor =0 do campo
                                is_active, ou seja, desactiva o comentário--}}
                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]])  !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Rejeitar', ['class'=>'btn btn-warning']) !!}
                            </div>


                            {!! Form::close() !!}

                            {{--Caso o comentário esteja inactivo , então se clicar neste butão
                                            o formulário leva para o método update o valor =1 do campo
                                            is_active, ou seja, activa o comentário--}}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]])  !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Aceitar', ['class'=>'btn btn-success']) !!}
                            </div>


                            {!! Form::close() !!}


                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',$reply->id]])  !!}



                        <div class="form-group">
                            {!! Form::submit('Apagar Resposta', ['class'=>'btn btn-danger']) !!}
                        </div>


                        {!! Form::close() !!}

                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @else
        <h1>Sem Respostas para avaliar...</h1>

    @endif
@endsection