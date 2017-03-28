@extends('layouts.blog-post')
@section('title')
    {{$post->title}}
    @endsection
@section('content')

    @include('includes.tinyeditor')

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
        {{--Se estiver logado, mas nao for admin, mostra só o nome do poster sem link--}}
        @if(Auth::check())
            @if(!Auth::user()->isAdmin())
                by {{$post->user->name}}
            @endif
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
    {{--Terá que ser com os pontos de interrogação porque o body pode ser uma imagem feita com upload pelo file manager--}}
    <p>{!! $post->body !!}</p>
    <hr>

    <div id="disqus_thread">
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
         var disqus_config = function () {
         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
         };
         */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://projecto.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//projecto.disqus.com/count.js" async></script>
    </div>
    {{-- <!-- Blog Comments -->

    {{--Está comentado o sistema de comments antigo. Agora usamos disqus--}}

    {{--Só permite ver esta caixa de enviar comentário se o user estiver logado--}}{{--
    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Deixe um Commentário:</h4>

            --}}{{--
                    Abrir o formulário com o método POST para poder usar o store do controller.
                        Consultar route:list
                --}}{{--
                {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store'])  !!}


                    --}}{{--Este campo serve para enviar ao controlador a informação sobre o id do post
                        Este input não vai aparecer na pagina de acrescentar o comentario, pois está como hidden
                           mas precisamos desta informação para criar o comentario...--}}{{--

                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group">
                        {!! Form::label('body','Comentário: ') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Criar Comentário', ['class'=>'btn btn-primary btn-sm']) !!}
                    </div>


                {!! Form::close() !!}

    </div>
    @else
        <div class="alert alert-warning">
            <small>Faça login ou registe-se para deixar comentários</small>
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
            {!! $comment->body !!}







            --}}{{--Comment Replies ("Nested Comment"--}}{{--




            @if(count ($comment->replies) > 0)

                <div class="view-comments-container">


                    <button class="toggle-comments btn btn-primary btn-xs pull-right">Ver Respostas</button> --}}{{--Ver/Esconder replies ao comentário--}}{{--



                    <div class="comments-replies col-sm-9">


                        @foreach($comment->replies as $reply)

                            @if($reply->is_active == 1)

                            <!-- Replies ao comment -->
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {!! $reply->body !!}
                                    </div>



                                <!-- Fim dos replies ao comment -->

                                 </div>

                            @endif
                            @endforeach

                            @if(Auth::check())
                            --}}{{--No fim de todos os replies, mostra o botao de responder ao comentário--}}{{--
                            <div class="comment-reply-container">


                                <button class="toggle-reply btn btn-primary btn-xs pull-left">Responder</button>--}}{{--Ver/esconder form para responder ao comentário--}}{{--

                                <div class="comment-reply">


                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])  !!}


                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    <div class="form-group">

                                        {!! Form::label('body','Resposta:') !!}
                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submeter Resposta', ['class'=>'btn btn-primary btn-sm']) !!}
                                    </div>


                                    {!! Form::close() !!}

                                </div>
                            </div>
                                @endif

                    </div>
                </div>


            @else
                --}}{{--Caso não haja replies ao comentário, então mostra directamente o formulário de submeter resposta ao comment--}}{{--
                <div class="comment-reply-container">

                    @if(Auth::check())
                    <button class="toggle-reply btn btn-primary btn-xs pull-left">Responder</button>--}}{{--Ver/esconder form para responder ao comentário--}}{{--

                    <div class="comment-reply">


                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])  !!}


                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                        <div class="form-group">

                            {!! Form::label('body','Resposta:') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submeter Resposta', ['class'=>'btn btn-primary btn-sm']) !!}
                        </div>


                        {!! Form::close() !!}

                    </div>
                        @endif
                </div>

                @endif

        </div>
    </div>

    @endforeach
    @endif
--}}
@endsection


@section('categories')
    <div class="row well">
        <h4>Categorias</h4>
        @foreach($categories->chunk(5) as $chunckedCategories)

            <div class="col-md-6">
                @foreach($chunckedCategories as $category)
                    <a href="{{route('tagged.posts',$category->id)}}"><li>{{$category->name}}</li></a>
                @endforeach
            </div>

        @endforeach

    </div>

@endsection

{{--Estes são os scripts dos botoes antigos para mostrar e esconder comentários. Agora usamos o disqus--}}

{{--@section('scripts')


    <script> --}}{{--Script para mostrar o formulario para responder ao comentário--}}{{--

        $(".comment-reply-container .toggle-reply").click(function(){

           $(this).next().slideToggle("fast");

        });

    </script>

    <script> --}}{{--Script para mostrar todos os replies ao comentário--}}{{--

        $(".view-comments-container .toggle-comments").click(function(){

            $(this).next().slideToggle("fast");

        });

    </script>

    <script> --}}{{--Script para mudar o nome do butão de ver respostas para esconder respostas--}}{{--

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

    <script> --}}{{--Script para esconder o butão "Responder" deopois de clicado--}}{{--

        $(function(){
            $(".toggle-reply").on('click',function() {
                $(this).hide();
                $(".comment-reply-container").show();
            });
        });

    </script>



@endsection--}}

@include('includes.form_errors') {{--Para adicionar o pedaço de código de verificação de erros--}}
