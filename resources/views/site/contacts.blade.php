@extends('site.layouts.master')

@section('title')

    Contacts

@endsection


@section('content') 


    <!-- contact info -->
    <section class="contact-info text-center">
        <div class="container">
            <!-- <div class="welcome-title text-center">
                <div class="section-title"><h2>Contact Us</h2></div>
                <div class="title"><p>&nbsp;</p></div>
            </div> -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                        </div>

                        <div class="info-content">
                            <h4>Address</h4>
                            @if ($site_settings->company_location) 
                                <div class="text"><p>{{ $site_settings->company_location }}</p></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Phone</h4>
                            @if ($site_settings->contact_phone) 
                                <div class="text"><p>{{ $site_settings->contact_phone }}</p></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            @if ($site_settings->contact_email) 
                                <div class="text"><p>{{ $site_settings->contact_email }}</p></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->

    <!-- contact form area -->
    <section class="contact-form-area section-padding text-center">
        <div class="container">
            <div class="contact-title">
                <div class="section-title"><h2>Get In <span>Touch</span></h2></div>
                <div class="title"><p>We reply to all emails within 48 Hrs</p></div>
            </div>
            <div class="contact-form">

                <form id="contact-form" name="contact_form" class="default-form" method="POST" action="{{ route('site.contacts.store') }}">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" value="" placeholder="Your Name" required="">
                            <input type="email" name="email" value="" placeholder="Your Email" required="">
                            <input type="text" name="phone" value="" placeholder="Phone Number" required="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea placeholder="Message" name="message" required=""></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                            <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn-one" data-loading-text="Please wait...">
                        Send Message
                    </button>

                </form>

            </div>
        </div>
    </section>
    <!-- contact form area end -->

    <!-- google map area -->
    <section class="google-map-area">
        <div
            class="google-map"
            id="contact-google-map"
            data-map-lat="{!! $site_settings->company_office_1_latitude !!}"
            data-map-lng="{!! $site_settings->company_office_1_longitude !!}"
            data-icon-path="site/images/resources/map-marker.png"
            data-map-title="{!! $site_settings->company_location !!}"
            data-map-zoom="12"
            data-markers='{
                "marker-1": [{!! $site_settings->company_office_1_latitude !!}, {!! $site_settings->company_office_1_longitude !!}, "<h4>Branch Office</h4><p>{!! $site_settings->company_location !!}</p>","site/images/resources/map-marker.png"]
            }'> 

        </div>
    </section>
    <!-- google map area end -->
         

@endsection  


@section('page_scripts')

    <script src="./site/js/html5lightbox/html5lightbox.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
    <script src="./site/js/map-script.js"></script>
    <script src="./site/js/gmaps.js"></script>
    <script src="./site/js/map-helper.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

@endsection 


@section('page_includes')

    @include('site.layouts.donatePopup') 

@endsection

