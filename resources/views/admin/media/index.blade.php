@extends('layouts.admin')
@section('content')


    <h1>Media</h1>

    @if($photos)

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Owner</th>
            <th>Criado a</th>

          </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->file}}" alt=""></td>
            <td>{{$photo->file}}</td>
            <td>{{$photo->user ? $photo->user->name : 'Sem Owner'}}</td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'Sem Data'}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>

    @endif
@endsection

