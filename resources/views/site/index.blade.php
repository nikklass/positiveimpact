@extends('site.layouts.master')

@section('title')

    Home

@endsection


@section('content')
    
    <!--Main Slider-->
    <section class="main-banner banner">
        <div class="rev_slider_wrapper">
            <div id="main_slider" class="rev_slider"  data-version="5.0">

                <ul>
                    <li data-index='rs-355' class="slide_show slide_1" data-transition='slidingoverlayright' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Boxes' data-description=''>

                        <img src="images/slider/slider-1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <div class="main_heading tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-140"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="y:[100%];s:1000;s:1000;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="2000"
                             data-splitin="none"
                             data-splitout="none">
                            <div class="banner-title"><h1>We Empower You</h1></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-60"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2300">
                            <div class="banner-text">
                                <p>
                                    We offer empowerment and self-development programmes to participants<br /> 
                                </p>
                            </div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="30"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[-1000%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2600">
                            <button class="donate-box-btn btn-one">Join Us</button>
                        </div>
                    </li>

                    <li data-index='rs-356' class="slide_show slide_2" data-transition='slidingoverlayleft' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Slots vertical' data-description=''>

                        <img src="images/slider/slider-2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <div class="main_heading tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-140"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="y:[100%];s:1000;s:1000;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="2000"
                             data-splitin="none"
                             data-splitout="none">
                            <div class="banner-title"><h1>Mentorship Programmes</h1></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-60"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2300">
                            <div class="banner-text"><p>We provide the youth with a platform where they can interact with <br/> mentors and trainers to improve their lives </p></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="30"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[1000%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2600">
                            <button class="donate-box-btn btn-one">Join Us</button>
                        </div>
                    </li>

                    <!-- <li class="slide_show slide_3" data-index='rs-381' data-transition='slidingoverlaydown' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='3D Curtain Vertical' data-description=''>

                        <img src="images/slider/slider-3.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <div class="main_heading tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-140"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="y:[100%];s:1000;s:1000;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="2000"
                             data-splitin="none"
                             data-splitout="none">
                            <div class="banner-title"><h1>You can help the poor</h1></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-60"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2300">
                            <div class="banner-text"><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa<br /> qui officia deserunt mollit anim id est laborum. </p></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="30"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[1000%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2600">
                            <button class="donate-box-btn btn-one">donate now</button>
                        </div>
                    </li> -->

                </ul>
            </div>
        </div>
    </section>
    <!--Main Slider End-->

    <!-- cause section -->
    <section class="our-cause section-padding text-center">
        <div class="container">
            <div class="cause-title">
                <div class="section-title"><h2>Who <span>We Are</span></h2></div>
                <div class="title">
                    <p>
                        Positive Impact is an organization dedicated to educating, empowering, and equipping individuals to transform their lives through hard work, dedication, and self-discipline.    
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <a href="causes-details.html">
                                <figure><img src="images/cause/1.jpg" alt=""></figure>
                                <div class="overlay">
                                </div>
                            </a>
                        </div>
                        <div class="cause-content">
                            <br/>
                            <h4><a href="causes-details.html">Career Development</a></h4>
                            <div class="text"><p>We provide the youth with a platform where they can interact.</p></div>
                            <button class="btn-one donate-box-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <a href="causes-details.html">
                                <figure><img src="images/cause/2.jpg" alt=""></figure>
                                <div class="overlay">
                                </div>
                            </a>
                        </div>
                        <div class="cause-content">
                            <br/>
                            <h4><a href="causes-details.html">Mentorship Sessions</a></h4>
                            <div class="text"><p>We provide the youth with a platform where they can interact.</p></div>
                            <button class="btn-one donate-box-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <a href="causes-details.html">
                                <figure><img src="images/cause/3.jpg" alt=""></figure>
                                <div class="overlay">
                                </div>
                            </a>
                        </div>
                        <div class="cause-content">
                            <br/>
                            <h4><a href="causes-details.html">ICT Development</a></h4>
                            <div class="text"><p>We provide the youth with a platform where they can interact.</p></div>
                            <button class="btn-one donate-box-btn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cause section end -->

    <!-- help-us section -->
    <section class="help-us section-padding text-center">
        <div class="container">
            <div class="help-us-title">
                <div class="section-title"><h2>How you can <span>help us</span></h2></div>
                <div class="title"><p>You can contribute in any of the following ways to support our activities</p></div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item one">
                        <div class="icon-box">
                            <i class="flaticon-box"></i>
                        </div>
                        <h4>Become Member</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item two">
                        <div class="icon-box">
                            <i class="flaticon-piggy-bank"></i>
                        </div>
                        <h4>Donate</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item three">
                        <div class="icon-box">
                            <i class="flaticon-people"></i>
                        </div>
                        <h4>Become Volunteer</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item four">
                        <div class="icon-box">
                            <i class="flaticon-people-2"></i>
                        </div>
                        <h4>Recommend</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- help-us section end -->

    <!-- img-gallery -->
    <section class="img-gallery text-center section-padding">
        <div class="container">
            <div class="img-gallery-title">
                <div class="section-title"><h2>Our <span>Gallery</span></h2></div>
                <div class="title"><p>View photos taken at our recent activities</p></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/1.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/1.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/2.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/2.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/3.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/3.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/4.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/4.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/5.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/5.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-holder">
                            <figure><img src="images/gallery/6.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="images/gallery/6.jpg" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-btn">
                <a href="gallery.html" class="btn-two">View All</a>
            </div>
        </div>
    </section>
    <!-- img-gallery end -->

    <!-- cta section -->
    <section class="cta-section section-padding">
        <div class="container-fullwidth">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                    <div class="cta-content">
                        <div class="section-title"><h2>Become a successful leader</h2></div>
                        <div class="text">
                            <p>
                            Using research and best practices, learn what successful 21st-century leaders look like and how you can adopt their inclusive leadership style. <br/>
                            Meet people like yourself, who want to be the best leaders they possibly can by incorporating inclusive leadership into their everyday lives.
                            </p>
                        </div>
                        <div class="cta-btn">
                            <button class="btn-two donate-box-btn">Join Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta section end -->

    <!-- news section -->
    <section class="news-section section-padding">
        <div class="container">
            <div class="news-title text-center">
                <div class="section-title"><h2>Recent News</h2></div>
                <div class="title"><p>Get a glimpse of our recent and forthcoming activities and ventures</p></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-box">
                            <div class="img-holder">
                                <figure><a href="single-blog.html"><img src="images/news/1.jpg" alt=""></a></figure>
                            </div>
                            <ul class="img-content text-center">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>20 Jan, 2017</li>
                                <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>350 Likes</li>
                                <li><i class="fa fa-comments-o" aria-hidden="true"></i>75 Comments</li>
                            </ul>
                        </div>
                        <div class="news-content">
                            <h4><a href="single-blog.html">Leadership Training</a></h4>
                            <div class="text">
                                <p>Leadership trainign will give you the skills to enable you lead effectively in the 21st century and beyond.</p>
                            </div>
                            <a href="#" class="btn-two">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-box">
                            <div class="img-holder">
                                <figure><a href="single-blog.html"><img src="images/news/2.jpg" alt=""></a></figure>
                            </div>
                            <ul class="img-content text-center">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>20 Jan, 2017</li>
                                <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>350 Likes</li>
                                <li><i class="fa fa-comments-o" aria-hidden="true"></i>75 Comments</li>
                            </ul>
                        </div>
                        <div class="news-content">
                            <h4><a href="single-blog.html">Young Girls Mentorship</a></h4>
                            <div class="text">
                                <p>Leadership trainign will give you the skills to enable you lead effectively in the 21st century and beyond. </p>
                            </div>
                            <a href="#" class="btn-two">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item same-height">
                        <div class="img-box">
                            <div class="img-holder">
                                <figure><a href="single-blog.html"><img src="images/news/3.jpg" alt=""></a></figure>
                            </div>
                            <ul class="img-content text-center">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>20 Jan, 2017</li>
                                <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>350 Likes</li>
                                <li><i class="fa fa-comments-o" aria-hidden="true"></i>75 Comments</li>
                            </ul>
                        </div>
                        <div class="news-content">
                            <h4><a href="single-blog.html">Young Boys Mentorship</a></h4>
                            <div class="text">
                                <p>Leadership trainign will give you the skills to enable you lead effectively in the 21st century and beyond. </p>
                            </div>
                            <a href="#" class="btn-two">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news section end -->

    <!-- our-volunteers section -->
    <!-- <section class="our-volunteers section-padding">
        <div class="container">
            <div class="our-volunteers-title text-center">
                <div class="section-title"><h2>Upcoming <span>Events</span></h2></div>
                <div class="title"><p>Cupidatat non proident sunt in culpa qui officia deserunt mollit</p></div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <figure><img src="images/team/1.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="single-volunteer.html">Tony Brown</a></h4>
                            <span>Business man</span>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit
                                    sed do eiusmod</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <figure><img src="images/team/2.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="single-volunteer.html">Tony Brown</a></h4>
                            <span>Business man</span>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit
                                    sed do eiusmod</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <figure><img src="images/team/3.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="single-volunteer.html">Tony Brown</a></h4>
                            <span>Business man</span>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit
                                    sed do eiusmod</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <figure><img src="images/team/4.jpg" alt=""></figure>
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="single-volunteer.html">Tony Brown</a></h4>
                            <span>Business man</span>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit
                                    sed do eiusmod</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- our-volunteers section end -->

    <!-- testimonials area -->
    <!-- <section class="testimonials section-padding text-center">
        <div class="container">
            <div class="testimonials-title">
                <div class="section-title"><h2>What People <span>Say</span></h2></div>
                <div class="title"><p>Cupidatat non proident sunt in culpa qui officia deserunt mollit</p></div>
            </div>
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                    <div class="testimonial-slider">
                        <div class="testimonials-content">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Enim ad minim veniam quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <div class="testimonials-autor">
                                <figure><img src="images/home/tes-autor.png" alt=""></figure>
                                <div class="autor">Samanta Doe</div>
                                <span>Member</span>
                            </div>
                        </div>
                        <div class="testimonials-content">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Enim ad minim veniam quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <div class="testimonials-autor">
                                <figure><img src="images/home/tes-autor.png" alt=""></figure>
                                <div class="autor">Samanta Doe</div>
                                <span>Member</span>
                            </div>
                        </div>
                        <div class="testimonials-content">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Enim ad minim veniam quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit.</p>
                            </div>
                            <div class="testimonials-autor">
                                <figure><img src="images/home/tes-autor.png" alt=""></figure>
                                <div class="autor">Samanta Doe</div>
                                <span>Member</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- testimonials area end -->

    <!-- sponsors section -->
    <!-- <section class="our-sponsors section-padding text-center">
        <div class="container">
            <div class="sponsors-title">
                <div class="section-title"><h2>Our <span>Partners</span></h2></div>
                <div class="title"><p>Cupidatat non proident sunt in culpa qui officia deserunt mollit</p></div>
            </div>
            <ul class="sponsors-slider">
                <li><a href="#"><figure><img src="images/sponsors/1.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/2.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/3.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/4.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/5.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/6.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/1.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/2.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/3.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/4.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/5.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/6.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/1.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/2.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/3.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/4.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/5.png" alt=""></figure></a></li>
                <li><a href="#"><figure><img src="images/sponsors/6.png" alt=""></figure></a></li>
            </ul>
        </div>
    </section> -->
    <!-- sponsors section end -->

    <!-- event & donation section -->
    <!-- <section class="event-donation section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 upcoming-event">
                    <div class="event-carousel">
                        <div class="event-donation-title">Upcoming <span>Events</span></div>
                        <div class="events-slide">
                            <div class="single-item">
                                <div class="date">20<span>Jan</span></div>
                                <div class="event-content">
                                    <h4><a href="events.html">Heart to Heart Event</a></h4>
                                    <ul class="meta">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>9.00 AM - 11.00 PM</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>29 Newyork City</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="date">20<span>Jan</span></div>
                                <div class="event-content">
                                    <h4><a href="events.html">Heart to Heart Event</a></h4>
                                    <ul class="meta">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>9.00 AM - 11.00 PM</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>29 Newyork City</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="date">20<span>Jan</span></div>
                                <div class="event-content">
                                    <h4><a href="events.html">Heart to Heart Event</a></h4>
                                    <ul class="meta">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>9.00 AM - 11.00 PM</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>29 Newyork City</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="date">20<span>Jan</span></div>
                                <div class="event-content">
                                    <h4><a href="events.html">Heart to Heart Event</a></h4>
                                    <ul class="meta">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>9.00 AM - 11.00 PM</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>29 Newyork City</li>
                                    </ul>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="outslide">
                            <div id="slider-next"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 make-donation">
                    <div class="donate-content">
                        <div class="event-donation-title">Make a <span>Donation</span></div>
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod
                                incididunt labore et dolore magna aliqua.</p>
                        </div>
                        <div class="dinate-form">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>I Want to Donate for</label>
                                    <select class="custom-select-box">
                                        <option selected="selected">I Want to Donate for</option>
                                        <option>United Kingdom</option>
                                        <option>California</option>
                                        <option>Canada</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Currency</label>
                                    <select class="custom-select-box">
                                        <option selected="selected">Currency</option>
                                        <option>United Kingdom</option>
                                        <option>California</option>
                                        <option>Canada</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label>How much do you want to donate?</label>
                                    <select class="custom-select-box">
                                        <option selected="selected">$50</option>
                                        <option>$100</option>
                                        <option>$200</option>
                                        <option>$300</option>
                                        <option>$500</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <label>Payment Type</label>
                                    <input type="radio" name="optionsRadios"  value="option1" checked="checked">
                                    <div class="text">One Time</div>
                                    <input type="radio" name="optionsRadios"  value="option1">
                                    <div class="text">Recurring</div>
                                </div>
                            </div>
                            <button class="btn-two donate-box-btn">Join Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- event & donation section end -->
         

@endsection  


@section('page_css')

    <link rel="stylesheet" href='./css/revolution-slider.css'> 

@endsection


@section('page_scripts')

    <script src= './js/jquery.themepunch.tools.min.js'></script>
    <script src= './js/jquery.themepunch.revolution.min.js'></script>
    <script src= './js/revolution.extension.slideanims.min.js'></script>
    <script src= './js/revolution.extension.layeranimation.min.js'></script>
    <script src= './js/revolution.extension.navigation.min.js'></script>
    <script src= './js/revolution.extension.kenburn.min.js'></script>
    <script src= './js/revolution.extension.actions.min.js'></script>
    <script src= './js/revolution.extension.parallax.min.js'></script>
    <script src= './js/revolution.extension.migration.min.js'></script>

@endsection 


@section('page_includes')

    @include('site.layouts.donatePopup') 

@endsection

