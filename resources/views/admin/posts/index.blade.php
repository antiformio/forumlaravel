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
            <th>User</th>
            <th>Titulo</th>
            <th>Conteúdo</th>
            <th>Categoria</th>
            <th>Criado</th>
            <th>Modificado</th>

        </tr>
        </thead>
        <tbody>


        @foreach($posts as $post)


            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" src="{{$post->photo ?  $post->photo->file : '/images/noimage.jpg'}}"></td>
                <td><a href="{{route('admin.users.show', $post->user->id)}}">{{$post->user->name}}</a></td>
                <td><a href=" {{ route('admin.posts.edit',$post->id) }}">{{$post->title}}</a></td>
                <td>{{$post->body}}</td>
                <td>{{$post->category ? $post->category->name : 'Sem Categoria'}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>


            </tr>

        @endforeach


        </tbody>
    </table
@endsection