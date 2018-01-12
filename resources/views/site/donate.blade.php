@extends('site.layouts.master')

@section('title')

    Donate

@endsection


@section('content')


    <!-- contact info -->
    <section class="contact-info text-center">
        <div class="container">
            <div class="welcome-title text-center">
                <div class="section-title"><h2>Make a Donation</h2></div>
                <div class="title"><p>We appreciate all donations made to us</p></div>
            </div>
            
        </div>
    </section>
    <!-- contact info end -->

    <!-- contact form area -->
    <section class="contact-form-area section-padding text-center">
        <div class="container">
            <div class="contact-title">
                <div class="section-title"><h2>Get In <span>Touch</span></h2></div>
            </div>
            <div class="contact-form">
                <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                            <input type="email" name="form_email" value="" placeholder="Your Email" required="">
                            <input type="text" name="form_phone" value="" placeholder="Phone Number" required="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea placeholder="Message" name="form_message" required=""></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn-one" data-loading-text="Please wait...">Send Message</button>
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
            data-icon-path="images/resources/map-marker.png"
            data-map-title="{!! $site_settings->company_location !!}"
            data-map-zoom="12"
            data-markers='{
                "marker-1": [{!! $site_settings->company_office_1_latitude !!}, {!! $site_settings->company_office_1_longitude !!}, "<h4>Branch Office</h4><p>{!! $site_settings->company_location !!}</p>","images/resources/map-marker.png"]
            }'> 

        </div>
    </section>
    <!-- google map area end -->
         

@endsection  



@section('page_scripts')

    <script src="./js/html5lightbox/html5lightbox.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
    <script src="./js/map-script.js"></script>

    <script src="./js/gmaps.js"></script>
    <script src="./js/map-helper.js"></script>

@endsection 


@section('page_includes')

    @include('site.layouts.donatePopup') 

@endsection

