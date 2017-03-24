@extends('layouts.admin')

@section('content')



        {{--Verificar se foram passadas flash messages do controller
                no controller é passado o parametro nome (message neste caso)
                outro que é a classe e por fim o info (ou é success, ou danger)--}}


        @if(count($comments) > 0)

            {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('message') }}</p>
            @endif

            <h1>Todos os comentários</h1>
                <table class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Post</th>
                          <th>is Active</th>
                          <th>Comentário</th>
                          <th>Respostas</th>
                          <th>Autor</th>
                          <th>Email</th>
                          <th>Criado a</th>
                      </tr>
                    </thead>


                    <tbody>

                    @foreach($comments as $comment)

                        <tr>
                            <td>{{$comment->id}}</td>
                            <td><a href="{{route('home.post',$comment->post->id )}}">{{$comment->post->title}}</a></td>
                            <td>{{$comment->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{\Illuminate\Support\Str::words($comment->body,3)}}</td>
                            <td><a href="{{ route('admin.comments.replies.show', $comment->id) }}">Ver Respostas</a></td>
                            <td><a href="{{route('admin.users.show',$comment->post->user_id)}}">{{$comment->author}}</a></td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                            <td>

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

                                </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]])  !!}



                                <div class="form-group">
                                    {!! Form::submit('Apagar Comentário', ['class'=>'btn btn-danger']) !!}
                                </div>


                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                  </table>
        @else
            <h1>Sem Comentários para avaliar...</h1>

        @endif
@endsection