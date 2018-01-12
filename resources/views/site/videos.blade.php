@extends('site.layouts.master')

@section('title')

    Videos

@endsection


@section('content')
    
    

    <section class="sidebar-page-container blog-page news-section causes-details">
        <div class="container">
            <div class="welcome-title text-center">
                <div class="section-title"><h2>Videos</h2></div>
                <div class="title"><p>&nbsp;</p></div>
            </div>

            <div class="row">
                <div class="content-side col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-item  wow fadeInUp animated animated animated animated">
                                <div class="img-box">
                                    <div class="img-holder">
                                        <figure><a href=""><img src="images/cause/3.jpg" alt=""></a></figure>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h4><a href="#">Mentorship Event</a></h4>
                                    <div class="text">
                                        <p>The youth will interact with christian mentors and trainers to improve their lives </p>
                                    </div>
                                    <a href="#" class="btn-two">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-item  wow fadeInUp animated animated animated animated">
                                <div class="img-box">
                                    <div class="img-holder">
                                        <figure><a href=""><img src="images/cause/3.jpg" alt=""></a></figure>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h4><a href="#">Mentorship Event</a></h4>
                                    <div class="text">
                                        <p>The youth will interact with christian mentors and trainers to improve their lives </p>
                                    </div>
                                    <a href="#" class="btn-two">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-item  wow fadeInUp animated animated animated animated">
                                <div class="img-box">
                                    <div class="img-holder">
                                        <figure><a href=""><img src="images/cause/3.jpg" alt=""></a></figure>
                                    </div>
                                    <!-- <ul class="img-content text-center">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>20 Jan, 2017</li>
                                        <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>350 Likes</li>
                                        <li><i class="fa fa-comments-o" aria-hidden="true"></i>75 Comments</li>
                                    </ul> -->
                                </div>
                                <div class="news-content">
                                    <h4><a href="#">Mentorship Event</a></h4>
                                    <div class="text">
                                        <p>The youth will interact with christian mentors and trainers to improve their lives </p>
                                    </div>
                                    <a href="#" class="btn-two">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-item  wow fadeInUp animated animated animated animated">
                                <div class="img-box">
                                    <div class="img-holder">
                                        <figure><a href=""><img src="images/cause/3.jpg" alt=""></a></figure>
                                    </div>
                                    <!-- <ul class="img-content text-center">
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>20 Jan, 2017</li>
                                        <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>350 Likes</li>
                                        <li><i class="fa fa-comments-o" aria-hidden="true"></i>75 Comments</li>
                                    </ul> -->
                                </div>
                                <div class="news-content">
                                    <h4><a href="#">Mentorship Event</a></h4>
                                    <div class="text">
                                        <p>The youth will interact with christian mentors and trainers to improve their lives </p>
                                    </div>
                                    <a href="#" class="btn-two">Read More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <ul class="link-btn">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
         

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

    <script src="./js/html5lightbox/html5lightbox.js"></script>

@endsection 


@section('page_includes')

    @include('site.layouts.donatePopup') 

@endsection

