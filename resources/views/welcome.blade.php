@extends('layouts.app')



{{--



HOMEPAGE (PARA TODOS OS UTILIZADORES, LOGADOS OU NÃO)




--}}





@section('content')


    <div class="container">

        @if(count($posts)>0)

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Code Talks
                    <small>Let´s talk about code...</small>
                </h1>


                <!-- First Blog Post -->

                @foreach($posts as $post)
                <h2>
                    <a href="{{ route('home.post',$post->slug) }}">{{$post->title}}</a>
                </h2>
                <p class="lead">

{{--Se o user estiver logado E for admin, então pode clicar no nome do user para ver o seu perfil--}}

                    @if(Auth::check())
                        @if(Auth::user()->isAdmin())
                            by <a href="{{route('admin.users.show',$post->user->id)}}">{{$post->user->name}}</a>
                        @endif


{{--Se não estiver logado, mostra só o nome do poster sem link--}}

                    @else
                        by {{$post->user->name}}
                    @endif

{{--Se estiver logado, mas nao for admin, mostra só o nome do poster sem link--}}

                    @if(Auth::check())
                        @if(!Auth::user()->isAdmin())
                            by {{$post->user->name}}
                        @endif
                    @endif
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Criado {{$post->created_at->diffForHumans()}}</p>
                <hr>
                    <img height="300" width="700" class="img-responsive" src="{{$post->photo->file}}" alt="">
                <hr>
                    <p class="lead">{{\Illuminate\Support\Str::words(strip_tags($post->body),6)}}
                <p><a class="btn btn-primary" href="{{ route('home.post',$post->slug) }}">Ler Mais <span class="glyphicon glyphicon-chevron-right"></span></a></p>







                    <hr>

                @endforeach

{{--Paginação de posts--}}

                <div class="pager">
                    <div class="col-sm9">
                        {{$posts->render()}}

                    </div>
                </div>



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

                <!-- Blog Categories Well --> {{--Parte a lista em grupos de 5 --}}
                <div class="row well">
                    <h4>Categorias</h4>
                                @foreach($categories->chunk(5) as $chunckedCategories)

                                     <div class="col-md-6">
                                         @foreach($chunckedCategories as $category)
                                             <a href="{{route('tagged.posts',$category->id)}}"><li>{{$category->name}}</a></li>
                                         @endforeach
                                     </div>

                                @endforeach

                </div>

                <!-- Side Widget Well -->

{{--<div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
--}}

            </div>

        </div>
        <!-- /.row -->

        <hr>
            @else
            <div class="no-posts">

                <h1>Não existem posts para mostrar...</h1>

            </div>

            @endif
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; FilipeMartins 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
@endsection



