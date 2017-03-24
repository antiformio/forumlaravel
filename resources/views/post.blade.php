@extends('layouts.blog-post')
@section('title')
    {{$post->title}}
    @endsection
@section('content')


    <!-- Title -->
    <h1>{{$post->title}}</h1>

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}</p>
    @endif

    <!-- Author -->
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
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}
    <hr>

    <!-- Blog Comments -->

    {{--Só permite ver esta caixa de enviar comentário se o user estiver logado--}}
    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Deixe um Commentário:</h4>

            {{--
                    Abrir o formulário com o método POST para poder usar o store do controller.
                        Consultar route:list
                --}}
                {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store'])  !!}


                    {{--Este campo serve para enviar ao controlador a informação sobre o id do post
                        Este input não vai aparecer na pagina de acrescentar o comentario, pois está como hidden
                           mas precisamos desta informação para criar o comentario...--}}

                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group">
                        {!! Form::label('body','Comentário: ') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Criar Comentário', ['class'=>'btn btn-primary']) !!}
                    </div>


                {!! Form::close() !!}

    </div>
    @endif
    <hr>

    <!-- Posted Comments -->



    @if(count ($comments) >0 )
    <!-- Comment -->

    @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64 "class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>







            {{--Comment Replies ("Nested Comment"--}}




            @if(count ($comment->replies) > 0)

                <div class="view-comments-container">

                    <button class="toggle-comments btn btn-info pull-right">Ver Respostas</button> {{--Vers/Esconder replies ao comentário--}}


                    <div class="comments-replies col-sm-9">


                        @foreach($comment->replies as $reply)



                            <!-- Replies ao comment -->
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>



                                <!-- Fim dos replies ao comment -->

                                 </div>
                            @endforeach


                            {{--No fim de todos os replies, mostra o botao de responder ao comentário--}}
                            <div class="comment-reply-container">


                                <button class="toggle-reply btn btn-primary pull-left">Responder</button>{{--Ver/esconder form para responder ao comentário--}}

                                <div class="comment-reply">


                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])  !!}


                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    <div class="form-group">

                                        {!! Form::label('body','Resposta:') !!}
                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submeter Resposta', ['class'=>'btn btn-primary']) !!}
                                    </div>


                                    {!! Form::close() !!}

                                </div>
                            </div>
                    </div>
                </div>


            @else
                {{--Caso não haja replies ao comentário, então mostra directamente o formulário de submeter resposta ao comment--}}
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])  !!}


                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                    <div class="form-group">

                        {!! Form::label('body','Resposta:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submeter Resposta', ['class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}

                @endif

        </div>
    </div>

    @endforeach
    @endif

@endsection


@section('categories')
    @foreach($categories as $category)
        <li>{{$category->name}}</li>
    @endforeach

@endsection

@section('scripts')


    <script> {{--Script para mostrar o formulario para responder ao comentário--}}

        $(".comment-reply-container .toggle-reply").click(function(){

           $(this).next().slideToggle("fast");

        });

    </script>

    <script> {{--Script para mostrar todos os replies ao comentário--}}

        $(".view-comments-container .toggle-comments").click(function(){

            $(this).next().slideToggle("fast");

        });

    </script>

    <script> {{--Script para mudar o nome do butão de ver respostas para esconder respostas--}}

        $('.toggle-comments').click(function(){
            var $this = $(this);
            $this.toggleClass('toggle-comments');
            if($this.hasClass('toggle-comments')){
                $this.text('Ver Respostas');
            } else {
                $this.text('Esconder Respostas');
            }
        });
    </script>

    <script> {{--Script para esconder o butão "Responder" deopois de clicado--}}

        $(function(){
            $(".toggle-reply").on('click',function() {
                $(this).hide();
                $(".comment-reply-container").show();
            });
        });

    </script>



@endsection

@include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}
