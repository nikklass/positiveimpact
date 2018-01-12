@extends('site.layouts.master')

@section('title')

    Programs

@endsection


@section('content')
    
    <!-- welcome section -->
    <section class="welcome-section section-padding">
        <div class="container">
            <div class="welcome-title text-center">
                <div class="section-title"><h2>Programs</h2></div>
                <div class="title"><p>&nbsp;</p></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="welcome-content">
                        <div class="title-text">Mentorship</div>
                        <div class="text">
                            <p>
                            Positive Impact’s one-on-one mentoring program connects the youth with caring Christian mentors and to build genuine rapport necessary for a nurturing relationship with each of our mentees. 
                            </p>
                            <p>Our mentor/mentee relationship represent a true relationship of love, attention, understanding, patience, listening, acceptance, time, and support. 
                            </p>
                            <p>The interactions between mentors and mentees will demonstrate and model accepting constructive feedback constructively, communicating assertively, obtaining new technical abilities, change management, and leadership skills. 
                            </p>
                            <p>
                            Mentors are also expected model poise, good decision-making, faith, high self-esteem, self-determination, and other characteristics which demonstrate a healthy way of living.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="video-gallery">
                        <img src="images/cause/3.jpg" alt="ICT Development">

                    </div>
                </div>
            </div>

            <hr>

            <div class="row section-padding">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="welcome-content">
                        
                        <div class="title-text">Mentors</div>
                        <div class="text">
                            <p>
                            To assist the youth in living better lives.
                            </p>
                        </div>

                        <div class="title-text">Workshops</div>
                        <div class="text">
                            <ul class="list">
                                <li>Career Development</li>
                                <li>Communication</li>
                                <li>Teenage and Parents workshop</li>
                                <li>Health and Nutrition</li>

                            </ul>
                        </div>

                        <div class="title-text">Training</div>
                        <div class="text">
                            <ul class="list">
                                <li>Swahili Lessons</li>
                                <li>ICT development</li>

                            </ul>
                        </div>

                        <!-- <button class="btn-one donate-box-btn">Donate Now</button> -->

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="video-gallery">
                        <img src="images/cause/1.jpg" alt="ICT Development">

                    </div>
                </div>
            </div>


            <!-- <hr> -->


        </div>


    </section>
    <!-- welcome section end -->


    <!-- sponsors section -->
    <!-- <section class="our-sponsors section-padding text-center">
        <div class="container">
            <div class="sponsors-title">
                <div class="section-title"><h2>Our <span>Sponsors</span></h2></div>
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

