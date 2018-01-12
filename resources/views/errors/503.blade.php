@extends('site.layouts.master')

@section('title')

    Error occured

@endsection


@section('content')


    
    <!-- error section -->
    <section class="error-section error-page text-center">
        <div class="container">
            <div class="row">
                <div class="error-title">5<i class="fa fa-delete-o" aria-hidden="true"></i>3</div>
                <div class="title">Oops! An error occured!</div>
                <div class="search-box">
                    
                    <a href="{{ route('site.home') }}" class="btn-one">Go to home</a>
                </div>
            </div>
        </div>
    </section>
    <!-- error section end -->

         

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

