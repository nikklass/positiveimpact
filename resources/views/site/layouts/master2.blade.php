@extends('site.layouts.mainMaster')


@section('main_content')
        
            
        @include('site.layouts.partials.header')

        @include('site.layouts.partials.sidebarLeft')

        
        <!-- @include('site.layouts.partials.sidebarRight') -->

        <!-- @include('site.layouts.partials.settingsRight') -->

        <!-- @include('site.layouts.partials.sidebarBackdropRight') -->


        @yield('sidebar')

        
        @yield('content')

        <!-- Footer -->
        @include('site.layouts.partials.footer')
        <!-- /Footer -->


@endsection
