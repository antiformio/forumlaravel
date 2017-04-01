<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    {{--    Para administrar os comentários     --}}
    <meta property="fb:admins" content="{filipenechom}"/>

    {{--favicon--}}
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <title>@yield('title')</title>


    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="{{asset('css/libs.css')}}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--Mostra um atalho para a pagina de administrador caso seja administrador--}}
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <a class="navbar-brand" href="{{ route('admin.index') }}">Admin Page</a>
                @endif
            @endif
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('home.welcome') }}">Página Inicial</a>
                </li>

                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
            {{--Se o user estiver logado, acrescenta botao para fazer logout--}}
            @if(Auth::check())
            <ul class="nav navbar-nav pull-right">

                <li> <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
                {{--Se o user não estiver logado, acrescenta botao para fazer login e/ou registo--}}
            @else
                <ul class="nav navbar-nav pull-right">
                     <li> <a href="{{ url('/register') }}">Register</a></li>
                    <li> <a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
                </ul>
            @endif
        </div>




        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->
            @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="row well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            @yield('categories')
            <div class="row well">
                <h4>Instagram</h4>
                <div class="input-group">
                    <!-- InstaWidget -->
                    <a href="https://instawidget.net/v/user/filipemrtns" id="link-4d3a6ebc795c25580a78390f89d3f84021422df9ad24d4e96d6147bb7926740d">@filipemrtns</a>
                    <script src="https://instawidget.net/js/instawidget.js?u=4d3a6ebc795c25580a78390f89d3f84021422df9ad24d4e96d6147bb7926740d&width=300px"></script>
                </div>

            </div>



        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; FilipeMartins 2017</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')

</body>

</html>
