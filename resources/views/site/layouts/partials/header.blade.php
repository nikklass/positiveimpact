<!-- .preloader -->
<div class="preloader"></div>
<!-- /.preloader -->

<!--Header search-->
<section class="header-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="search-form pull-right">
                    <form action="#">
                        <div class="search">
                            <input type="search" name="search" value="" placeholder="Search Something">
                            <button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Header search-->


<!-- main header area -->
<header class="main-header">
    <div class="header-upper">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <ul class="top-left">
                        <li><i class="fa fa-phone"></i>Call:  {{ $site_settings->contact_phone }} </li>
                        <li><i class="fa fa-envelope"></i>Email:  {{ $site_settings->contact_email }}</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="top-right clearfix">
                        <ul class="social-link">
                            <li>Follow Us On: </li>

                            @if ($site_settings->facebook_page_url) 
                                <li>
                                    <a href="{{ $site_settings->facebook_page_url }}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($site_settings->twitter_page_url) 
                                <li>
                                    <a href="{{ $site_settings->twitter_page_url }}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($site_settings->linkedin_page_url) 
                                <li>
                                    <a href="{{ $site_settings->linkedin_page_url }}">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-lower">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="{{ route('site.home') }}">
                            <img src="images/home/logo.png" 
                                alt="{{ config('app.name') }}" height="78">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="menu-bar">
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li class="current">
                                        <a href="{{ route('site.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('site.about') }}">About</a>
                                    </li>
                                    <li class="dropdown"><a href="{{ route('site.programs') }}">Programs</a>
                                        <ul>
                                            <li><a href="#">Mentorship</a></li>
                                            <li><a href="#">Workshops</a></li>
                                            <li><a href="#">Training</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li class="dropdown"><a href="#">Blogs</a>
                                        <ul>
                                            <li><a href="events.php">Our Events</a></li>
                                            <li><a href="events-details.php">Events Details</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="dropdown"><a href="{{ route('site.videos') }}">Videos</a>
                                        <!-- <ul>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="single-volunteer.html">Single Volunteer</a></li>
                                            <li><a href="gallery.html">Our Gallery</a></li>
                                            <li><a href="error.html">Error Page</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="dropdown"><a href="{{ route('site.blog') }}">Blogs</a>
                                        <!-- <ul>
                                            <li><a href="blog">Our Blog</a></li>
                                            <li><a href="single-blog">Blog Single</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="{{ route('site.contacts') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="info-box">
                            <button class="donate-box-btn btn-one">Donate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="{{ route('site.home') }}">
                            <img src="images/home/logo.png" 
                            alt="{{ config('app.name') }}" height="78">
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="menu-bar">
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li class="current">
                                        <a href="{{ route('site.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('site.about') }}">About</a>
                                    </li>
                                    <li class="dropdown"><a href="#">Programs</a>
                                        <ul>
                                            <li><a href="#">Mentorship</a></li>
                                            <li><a href="#">ICT Development</a></li>
                                            <li><a href="#">Leadership</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Videos</a>
                                        <!-- <ul>
                                            <li><a href="events.php">Our Events</a></li>
                                            <li><a href="events-details.html">Events Details</a></li>
                                        </ul> -->
                                    </li>
                                    <!-- <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="single-volunteer.html">Single Volunteer</a></li>
                                            <li><a href="gallery.html">Our Gallery</a></li>
                                            <li><a href="error.html">Error Page</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="dropdown"><a href="blog">Blog</a>
                                        <ul>
                                            <li><a href="blog">Our Blog</a></li>
                                            <li><a href="single-blog">Blog Single</a></li>
                                    </li>
                                    <li><a href="contacts">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="info-box">
                            <button class="donate-box-btn btn-one">Donate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Sticky Header-->
