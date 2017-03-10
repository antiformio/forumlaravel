@extends('layouts.admin')


@section('content')


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
        <th>Actualizado</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>

    @foreach($users as $user)


    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role ? $user->role->name : 'O user não tem Role'}}</td>
        <td>{{$user->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>

        <td><img height="50" src="{{$user->photo ?  $user->photo->file : 'Não tem foto'}}"></td>

      </tr>

     @endforeach

    </tbody>
  </table>


    @endsection