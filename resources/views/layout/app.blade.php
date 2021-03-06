<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cygne Bleu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("img")}}/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{asset("css")}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("css")}}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset("css")}}/magnific-popup.css">
    <link rel="stylesheet" href="{{asset("css")}}/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset("css")}}/themify-icons.css">
    <link rel="stylesheet" href="{{asset("css")}}/nice-select.css">
    <link rel="stylesheet" href="{{asset("css")}}/flaticon.css">
    <link rel="stylesheet" href="{{asset("css")}}/gijgo.css">
    <link rel="stylesheet" href="{{asset("css")}}/animate.css">
    <link rel="stylesheet" href="{{asset("css")}}/slick.css">
    <link rel="stylesheet" href="{{asset("css")}}/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="{{asset("css")}}/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/daterangepicker/daterangepicker.css">

    @yield("head")
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{route("index")}}">
                                        <img src="{{asset("img")}}/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="{{route("index")}}">home</a></li>
                                            <li><a class="" href="{{route("VoyageOrganiseController.VoyageOrganise")}}">Voyage organis??</a></li>
                                            <li><a class="" href="{{route("HotelController.Hotel")}}">Hotel</a></li>
                                            <!--<li><a href="{{route("Contact")}}">Contact</a></li>-->
                                            <li><a href="{{route("admin.index")}}">Admin</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i> {{$GeneralSetting->Telephone_1}}</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li>
                                                <a target="_blank" href="{{$GeneralSetting->facebook}}"> <i class="fa fa-facebook"></i> </a>
                                            </li>
                                            <li>
                                                 <a target="_blank" href="{{$GeneralSetting->instagram}}"> <i class="fa fa-instagram"></i> </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="{{$GeneralSetting->twitter}}">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="{{$GeneralSetting->youtube}}">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{asset("img")}}/footer_logo.png" alt="">
                                </a>
                            </div>
                            <p> {{$GeneralSetting->Adresse}} <br>
                                <a href="#">{{$GeneralSetting->Telephone_1}} </a> <br>
                                <a href="#">{{$GeneralSetting->Telephone_2}}</a> <br>
                                <a href="#">{{$GeneralSetting->Fix}}</a> <br>
                                <a href="#">{{$GeneralSetting->Email}}</a>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a target="_blank" href="{{$GeneralSetting->facebook}}"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                         <a target="_blank" href="{{$GeneralSetting->instagram}}"> <i class="fa fa-instagram"></i> </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{$GeneralSetting->twitter}}">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{$GeneralSetting->youtube}}">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-xl-5 col-md-6 col-lg-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d798.8291275771497!2d3.245587!3d36.786961!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1cde0cb2af3ef43f!2sAgence%20de%20voyage%20Cygne%20Bleu!5e0!3m2!1sen!2sus!4v1627034368661!5m2!1sen!2sus" 
                        width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                      
                    </div>
                    
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Instagram
                            </h3>
                            <div class="instagram_feed">
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/1.png" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/2.png" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/3.png" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/4.png" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/5.png" alt="">
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="{{asset("img")}}/instagram/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>
    <!-- link that opens popup -->
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
    <!-- JS here -->
    <script src="{{asset("js")}}/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{asset("js")}}/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{asset("js")}}/popper.min.js"></script>
    <script src="{{asset("js")}}/bootstrap.min.js"></script>
    <script src="{{asset("js")}}/owl.carousel.min.js"></script>
    <script src="{{asset("js")}}/isotope.pkgd.min.js"></script>
    <script src="{{asset("js")}}/ajax-form.js"></script>
    <script src="{{asset("js")}}/waypoints.min.js"></script>
    <script src="{{asset("js")}}/jquery.counterup.min.js"></script>
    <script src="{{asset("js")}}/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset("js")}}/scrollIt.js"></script>
    <script src="{{asset("js")}}/jquery.scrollUp.min.js"></script>
    <script src="{{asset("js")}}/wow.min.js"></script>
    <script src="{{asset("js")}}/jquery-ui.min.js"> </script>
    <script src="{{asset("js")}}/nice-select.min.js"></script>
    <script src="{{asset("js")}}/jquery.slicknav.min.js"></script>
    <script src="{{asset("js")}}/jquery.magnific-popup.min.js"></script>
    <script src="{{asset("js")}}/plugins.js"></script>
    <script src="{{asset("js")}}/gijgo.min.js"></script>
    <script src="{{asset("js")}}/slick.min.js"></script>
   

    
    <!--contact js-->
    <script src="{{asset("js")}}/contact.js"></script>
    <script src="{{asset("js")}}/jquery.ajaxchimp.min.js"></script>
    <script src="{{asset("js")}}/jquery.form.js"></script>
    <script src="{{asset("js")}}/jquery.validate.min.js"></script>
    <script src="{{asset("js")}}/mail-script.js"></script>
    <script src="{{asset("Admin")}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset("Admin")}}/plugins/daterangepicker/daterangepicker.js"></script>
    

    <script src="{{asset("js")}}/main.js"></script>
   
    @yield("script")
</body>

</html>