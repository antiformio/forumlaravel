
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
                <div class="swiper-slide dark" style="background-image: url('images/1491151617ISEP3.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-caption-animate="fadeInUp">Filipe Martins</h2>
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

                            <img src="images/footer-widget-logo.png" alt="" class="footer-logo">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

                            <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third">

                        <div class="widget widget_links clearfix">

                            <h4>Blogroll</h4>

                            <ul>
                                <li><a href="http://codex.wordpress.org/">Documentation</a></li>
                                <li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
                                <li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
                                <li><a href="http://wordpress.org/support/">Support Forums</a></li>
                                <li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
                                <li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
                                <li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Recent Posts</h4>

                            <div id="post-list-footer">
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Total Downloads</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Clients</h5>
                            </div>

                        </div>

                    </div>

                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                            <div class="input-group divcenter">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                <span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
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
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>
                            <div class="col-md-6 clearfix">
                                <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
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
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
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