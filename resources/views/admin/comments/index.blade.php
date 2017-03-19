@extends('layouts.admin')

@section('content')



        {{--Verificar se foram passadas flash messages do controller
                no controller é passado o parametro nome (message neste caso)
                outro que é a classe e por fim o info (ou é success, ou danger)--}}
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}</p>
        @endif

        @if(count($comments) > 0)

            {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('message') }}</p>
            @endif

            <h1>Comentários</h1>
                <table class="table">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Post</th>
                          <th>is Active</th>
                          <th>Comentário</th>
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
                            <td><a href="{{route('admin.comments.show', $comment->id)}}">{{\Illuminate\Support\Str::words($comment->body,3)}}</a></td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                        </tr>

                    @endforeach


                    </tbody>
                  </table>
        @else
            <h1>Sem Comentários para avaliar...</h1>

        @endif
@endsection