@extends('layouts.admin')


@section('content')

    {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}</p>
    @endif

<h1>Utilizadores</h1>


<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Criado</th>
        <th>Modificado</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>

    @foreach($users as $user)


    <tr>
        <td>{{$user->id}}</td>
        <td><a href=" {{ route('admin.users.edit',$user->id) }}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role ? $user->role->name : 'O user não tem Role'}}</td>
        <td>{{$user->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>

        <td><img height="50" src="{{$user->photo->file}}"></td>

      </tr>

     @endforeach

    </tbody>
  </table>


    @endsection