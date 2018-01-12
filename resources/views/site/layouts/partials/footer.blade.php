<!-- main footer area -->
<footer class="main-footer-area">
    <div class="container">
        <!-- <div class="footer-top-area">
            <ul class="footer-socila">
                <li><h4>Connect With Us:</h4></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
            <div class="footer-subscribe">
                <form method="post" action="index.html">
                    <div class="form-group">
                        <input type="email" name="search" placeholder="Email Address" required>
                        <button type="submit" class="btn-one">Subscribe</button>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="main-footer">
            <div class="row">
                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                    <div class="logo-widget">
                        <div class="footer-logo">
                            <figure>
                                <a href="{{ route('site.home') }}">
                                    <img src="images/footer/logo.png" alt="Positive Impact" height="78">
                                </a>
                            </figure>
                        </div>
                        <div class="text">
                            <p>
                               
                               {{ $site_settings->company_website_footer_desc }}

                            </p> 
                        </div>
                    </div>
                </div>
                <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                    <div class="link-widget">
                        <h4>Quick Links</h4>
                        <ul class="list">
                            <li><a href="{{ route('site.about') }}">About Us</a></li>
                            <li><a href="{{ route('site.programs') }}">Programs</a></li>
                            <li><a href="{{ route('site.videos') }}">Videos</a></li>
                            <li><a href="{{ route('site.blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <!-- <div class="footer-colmun col-md-4 col-sm-6 col-xs-12">
                    <div class="gallery-widget">
                        <h4>Our Gallery</h4>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/1.jpg" alt=""></a></figure>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/2.jpg" alt=""></a></figure>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/3.jpg" alt=""></a></figure>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/4.jpg" alt=""></a></figure>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/5.jpg" alt=""></a></figure>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <figure><a href="gallery.html"><img src="images/footer/6.jpg" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="footer-colmun col-md-4 col-sm-6 col-xs-12">
                    <div class="contact-widget">
                        <h4>Contact Us</h4>
                        <!-- <div class="text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod.</p>
                        </div> -->

                        @if ($site_settings->company_location)
                        <div class="single-item">
                            <div class="icon-box"><i class="fa fa-home" aria-hidden="true"></i></div>
                            <div class="text">{{ $site_settings->company_location }},</div>
                        </div>
                        @endif

                        @if ($site_settings->contact_phone) 
                        <div class="single-item">
                            <div class="icon-box"><i class="fa fa-phone"></i></div>
                            <div class="text">{{ $site_settings->contact_phone }}</div>
                        </div>
                        @endif

                        @if ($site_settings->contact_email) 
                        <div class="single-item">
                            <div class="icon-box"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <div class="mail">
                                <a href="#">{{ $site_settings->contact_email }}</a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="text">
                <p>
                    Copyright &copy; 
                    <a href="{{ route('site.home') }}">PositiveImpact</a> {!! date('Y') !!}. 
                    All Rights Reserved.
                    &nbsp;
                    <a href="http://showbiz.co.ke" target="_blank">Heavybit.</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- main footer area end -->
