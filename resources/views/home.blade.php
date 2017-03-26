@extends('layouts.app')


{{--



PÁGINA DE BOAS VINDAS (DEOPOIS DO LOGIN)




--}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <h1>Bem vindo {{Auth::user()->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
