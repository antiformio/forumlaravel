@extends('layouts.admin')


@section('content')

    {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}</p>
    @endif

    <h1>Posts</h1>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Categoria</th>
            <th>Titulo</th>
            <th>Conteúdo</th>
            <th>Comentários</th>
            <th>Criado</th>
            <th>Modificado</th>
            <th>User</th>

        </tr>
        </thead>
        <tbody>


        @foreach($posts as $post)


            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" src="{{$post->photo->file}}"></td>
                <td>{{$post->category ? $post->category->name : 'Sem Categoria'}}</td>
                <td><a href=" {{ route('admin.posts.edit',$post->id) }}">{{$post->title}}</a></td>
                <td>{{\Illuminate\Support\Str::words(strip_tags($post->body),4)}}</td>
                <td><a href="{{route('admin.comments.show',$post->id)}}">Ver Comentários</a></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="{{route('admin.users.show', $post->user->id)}}">{{$post->user->name}}</a></td>
                <td><a href="{{route('home.post', $post->slug)}}">Ver Post</a></td>


            </tr>

        @endforeach


        </tbody>
    </table>


    {{--Paginação de posts (ver método index do AdminPostsController e dar o numero de posts por parametro ao paginate--}}
    <div class="row">
        <div class="col-sm6 col-sm-offset-5">
            {{$posts->render()}}

        </div>
    </div>
@endsection