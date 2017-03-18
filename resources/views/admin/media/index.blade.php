@extends('layouts.admin')
@section('content')


    {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}</p>
    @endif

    <h1>Media</h1>

    @if($photos)

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Criado a</th>

          </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->file}}" alt=""></td>
            <td>{{$photo->file}}</td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'Sem Data'}}</td>
            <td>
                {{--Formulário para apagar imagem--}}

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])  !!}

                            <div class="form-group">
                                {!! Form::submit('Apagar', ['class'=>'btn btn-danger']) !!}
                            </div>


                        {!! Form::close() !!}


            </td>
          </tr>
          @endforeach

        </tbody>
      </table>

    @endif
@endsection

