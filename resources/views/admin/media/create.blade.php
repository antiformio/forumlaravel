@extends('layouts.admin')

{{--Este estilo só corre nesta pagina. Para saber mais da utilização ver dropzone.com--}}
@section('styles')
    {{--Escrever link.css e dar tab--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" class="css">


    @endsection



@section('content')


    <h1>Upload Foto</h1>


            {{--Neste caso tem de se dar uma class ao formulario para poder aplicar os css referentes ao dropzone--}}
            {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone'])  !!}



            {!! Form::close() !!}


    @endsection


@section('scripts')
    {{--Escrever script.src e dar tab--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@endsection