
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    {{--favicon--}}
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Code Blog - Filipe Martins</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">



    {{--                                                    FULL SCREEN
   <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">--}}

    <section id="slider" class="slider-parallax swiper_wrapper clearfix" data-autoplay="7000" data-speed="650" data-loop="true">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('images/banner.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-caption-animate="fadeInUp">Code Talks</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">Let´s talk about code &amp; much more...</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dark">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-caption-animate="fadeInUp">Tuturiais sobre Laravel</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">Videos &amp; outros suportes mídia code related.</p>
                        </div>
                    </div>
                    <div class="video-wrap">
                        <video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
                            <source src='images/1491150870code2.mp4' type='video/mp4' />
                            <source src='images/videos/explore.webm' type='video/webm' />
                        </video>
                        <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('images/1491209026code3.jpg'); background-position: center top;">
                    <div class="container clearfix">
                        <div class="slider-caption">
                            <h2 data-caption-animate="fadeInUp" style="color: #1ABC9C">Filipe Martins</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">Estudante de Engenharia Informática no Instituto Superior de Engenharia do Porto</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
            <div class="swiper-pagination"></div>
        </div>

    </section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">


            <div class="container clearfix">

                <div class="heading-block center">
                    <h1>Publicados Recentemente</h1>
                    <span>Estes são os posts mais recentes do blog</span>
                </div>

                <!-- Posts
                ============================================= -->
                <div id="posts">

                    @foreach($posts as $post)
                    <div class="entry clearfix">
                        <div class="entry-image">
                            <a href="{{$post->photo->file}}" data-lightbox="image"><img class="image_fade" src="{{$post->photo->file}}" alt="Standard Post with Image"></a>
                        </div>
                        <div class="entry-title">
                            <h2><a href="blog-single.html">{{$post->title}}</a></h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> {{$post->created_at->diffForHumans()}}</li>
                            <li><a href="#"><i class="icon-user"></i> {{$post->user->name}}</a></li>
                            <li><i class="icon-folder-open"></i><a href="#">{{$post->category->name}}</a></li>
                            <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13 Comments</a></li>
                            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                        </ul>
                        <div class="entry-content">
                            <p>{{\Illuminate\Support\Str::words(strip_tags($post->body),6)}}</p>
                            <a href="blog-single.html"class="more-link">Ler Mais</a>
                        </div>
                    </div>

                @endforeach
                </div><!-- #posts end -->

                <!-- Pagination
                ============================================= -->
                @include('pagination.default', ['paginator' => $posts])

            </div>

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_two_third">

                    <div class="col_one_third">

                        <div class="widget clearfix">

                            <img src="images/1491151617ISEP3.jpg" alt="" class="footer-logo">

                            <p>Página pessoal de Filipe Martins, Engenharia Informática ISEP</p>

                            <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">

                                <abbr title="Phone Number"><strong>Telefone:</strong></abbr> 915 383 913<br>

                                <abbr title="Email Address"><strong>Email:</strong></abbr> fjnmgm@gmail.com
                            </div>

                        </div>

                    </div>




                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Posts Recentes</h4>

                            <div id="post-list-footer">
                                @foreach ($posts as $post)
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">{{$post->title}}</a></h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li>{{$post->created_at->diffForHumans()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                   @if($loop->iteration>2)
                                        @break
                                   @endif
                                @endforeach



                            </div>
                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="50" data-to="{{$posts->total()}}" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Posts no blog</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Visitas</h5>
                            </div>

                        </div>

                    </div>

                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscreve</strong> a newsletter para receber notificações de novos posts &amp; tuturiais: </h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                            <div class="input-group divcenter">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="O teu email">
                                <span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscrever</button>
									</span>
                            </div>
                        </form>
                    </div>

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>O meu perfil</strong><br>no Facebook</small></a>
                            </div>


                        </div>

                    </div>

                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyright &copy; Filipe Martins 2017<br>

                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>