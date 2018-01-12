@extends('site.layouts.mainMaster')


@section('main_content')
        
            
        @include('site.layouts.partials.header') 

        <!-- @include('site.layouts.partials.sidebarLeft') -->


        @yield('sidebar')

        
        @yield('content')
        

        <!-- Footer -->
        @include('site.layouts.partials.footer')
        <!-- /Footer -->


@endsection
