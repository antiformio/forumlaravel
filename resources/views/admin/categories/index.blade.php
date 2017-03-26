@extends('layouts.admin')
@section('content')



        @include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}



    {{--Verificar se foram passadas flash messages do controller
            no controller é passado o parametro nome (message neste caso)
            outro que é a classe e por fim o info (ou é success, ou danger)--}}
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}</p>
    @endif

    <div class="row">

        <h1>Categorias</h1>

        <div class="col-sm-6">


            <h4>Criar Categoria</h4>
            {{--
                Abrir o formulário com o método POST para poder usar o store do controller.
                    Consultar route:list
            --}}
            {!! Form::model(['method'=>'POST', 'action'=>'AdminCategoriesController@store'])  !!}


            {{-- O primeiro campo "name" tem de ser igual ao nome do atributo na Base de dados
                    tanto no label como no text. Aplica-se a todos os nomes dos campos dos
                    formularios. Ex. name, email, password, photo_id, role_id --}}
            <div class="form-group">
                {!! Form::label('name','Nome:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::submit('Criar Categoria', ['class'=>'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}

        </div>


        <div class="col-sm-6">

            {{--Aqui fica o display das categorias--}}
            <h4>Listar Categorias</h4>
            @if($categories)
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Criada</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href=" {{ route('admin.categories.edit',$category->id) }}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'Sem data'}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>




            @endif


        </div>

    </div>




    @endsection