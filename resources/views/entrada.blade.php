
<!DOCTYPE HTML>

<html>
<head>
    <title>Code Blog</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{--css--}}
    <link rel="stylesheet" href="css/main.css" />

    {{--favicon--}}
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">


</head>
<body>

<!-- Header -->
<header id="header" class="alt">
    <div class="inner">
        <h1>Code Blog</h1>
        <p>Let´s talk about code... by Filipe Martins</p>
    </div>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <h2>Bem vindos ao meu blog</h2>
        <p><b>O meu nome é Filipe Martins, sou um estudante de Engenharia Informática, e esta é <br>
                a minha primeira
            experiência com a framework Laravel em PHP. <br>
            Cliquem no link em baixo para aceder ao repositório do site!</b></p>
        <ul class="actions">
            <li><a href="https://github.com/antiformio/forumlaravel" class="button big">GitHub</a></li>
        </ul>
    </section>

    <div class="info">
        Recentemente publicados...
    </div>

    <style>
        .info {

            font-size: 2em;
            padding: 0 0.5em 0.25em 0.5em;
            border-bottom: solid 2px #ffffff;
            font-weight: 200;

            font-family: "Pacifico", cursive;

            margin: auto;
        }
    </style>

    <!-- Items -->
    <section class="main items">

       @foreach($posts as $post)
        <article class="item">
            <header>
                <a href="{{ route('home.post',$post->slug) }}"><img src="{{$post->photo->file}}" alt="" /></a>
                <h3>{{$post->slug}}</h3>
            </header>
            <p>{{strip_tags($post->body)}}</p>
            <ul class="actions">
                <li><a href="{{ route('home.post',$post->slug) }}" class="button">Ler Mais</a></li>
            </ul>
        </article>
        @endforeach
    </section>

    <!-- CTA -->
    <section id="cta" class="main special">
        <h2>Aceda ao blog!</h2>
        <p>Clique em baixo para ver todos os posts e todas as categorias.</p>
        <ul class="actions">
            <li><a href="{{route('home.welcome')}}" class="button big">Ir para o Blog</a></li>
        </ul>
    </section>

    <!-- Main -->
    <!--
        <section id="main" class="main">
            <header>
                <h2>Lorem ipsum dolor</h2>
            </header>
            <p>Fusce malesuada efficitur venenatis. Pellentesque tempor leo sed massa hendrerit hendrerit. In sed feugiat est, eu congue elit. Ut porta magna vel felis sodales vulputate. Donec faucibus dapibus lacus non ornare. Etiam eget neque id metus gravida tristique ac quis erat. Aenean quis aliquet sem. Ut ut elementum sem. Suspendisse eleifend ut est non dapibus. Nulla porta, neque quis pretium sagittis, tortor lacus elementum metus, in imperdiet ante lorem vitae ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam eget neque id metus gravida tristique ac quis erat. Aenean quis aliquet sem. Ut ut elementum sem. Suspendisse eleifend ut est non dapibus. Nulla porta, neque quis pretium sagittis, tortor lacus elementum metus, in imperdiet ante lorem vitae ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        </section>
    -->

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">

            <li><a href="https://www.facebook.com/filipenechom" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p class="copyright">Filipe Martins. <br> Design: Filipe Martins.</p>
    </footer>

</div>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/util.js"></script>
<script src="js/main.js"></script>


</body>
</html>