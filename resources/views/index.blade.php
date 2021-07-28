@extends('layout.app')
@section('head')
 <style>
     .popular_places_area{
        padding-top: 40px;
     }
     @media (max-width: 767px) {
        .where_togo_area .form_area h3 {
            margin-bottom: 15px;
        }
    }
    </style>   
@endsection
@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Indonesia</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- where_togo_area_start  -->

    <div class="where_togo_area">
        <div class="card card-secondary" style="border:0px">
            <div class="card-header" style="border-bottom:0px;padding:0px;">
                <ul class="nav nav-pills" id="pills-tab_index" role="tablist" style="color: #fff"> 
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <i class="fas fa-suitcase-rolling"></i>
                        Voyage Organiser
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <i class="fa fa-hotel"></i>
                            Hotel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <i class="fas fa-plane"></i>
                            Vols
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <i class="fas fa-ship"></i>
                            Bateau
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container">
                        <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="search_wrap">
                                        <form class="search_form" action="{{route("VoyageOrganiseController.VoyageOrganise")}}" method="GET">
                                            <div class="input_field input_field_voyage" >
                                                <select  id='pays' name="pays" onchange="SelectVilles(this.value)">
                                                    <option data-display="All Country" value="0">All Country</option>
                                                    @foreach ($pays as $item)
                                                        <option value="{{$item->id}}">{{$item->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input_field input_field_voyage" >
                                                <select  name="ville" id='ville'>
                                                    <option data-display="All Villes" value="0">All Villes</option>
                                                </select>
                                            </div>
                                            <div class="input_field input_field_voyage">
                                                <input id="datepicker" placeholder="Date">
                                            </div>
                                            
                                            <div class="search_btn">
                                                <button class="boxed-btn4 " type="submit" >Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container">
                        <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="search_wrap">
                                        <form class="search_form" action="{{route("VoyageOrganiseController.VoyageOrganise")}}" method="GET">
                                            <div class="input_field input_field_voyage" >
                                                <select  id='pays' name="pays" onchange="SelectVilles(this.value)">
                                                    <option data-display="All Country" value="0">All Country</option>
                                                    @foreach ($pays as $item)
                                                        <option value="{{$item->id}}">{{$item->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input_field input_field_voyage" >
                                                <select  name="ville" id='ville'>
                                                    <option data-display="All Villes" value="0">All Villes</option>
                                                </select>
                                            </div>
                                            <div class="input_field input_field_voyage">
                                                <input id="datepicker_hotel" placeholder="Date">
                                            </div>
                                            
                                            <div class="search_btn">
                                                <button class="boxed-btn4 " type="submit" >Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="search_wrap">
                                    <form class="search_form" action="" method="post">
                                        @csrf
                                        <div class="input_field input_field_billet">
                                            <select  id='pays' name="ville_from" onchange="SelectVilles(this.value)">
                                                <option data-display="From ?" value="0">From ?</option>
                                                @foreach ($pays as $item)
                                                    @foreach($item->ville()->get() as $ville)
                                                        <option value="{{$item->id}}">{{$ville->nom}} - {{$item->nom}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input_field input_field_billet">
                                            <select  id='pays' name="ville_to" onchange="SelectVilles(this.value)">
                                                <option data-display="To ?" value="0">To ?</option>
                                                @foreach ($pays as $item)
                                                    @foreach($item->ville()->get() as $ville)
                                                        <option value="{{$item->id}}">{{$ville->nom}} - {{$item->nom}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input_field input_field_billet">
                                            <select  id='Type'>
                                                <option data-display="Aller - Retour" value="0">Aller - Retour</option>
                                                <option data-display="Aller Simple" value="1">Aller Simple</option>
                                                
                                            </select>
                                        </div>
                                        <div class="input_field input_field_billet">
                                            <input id="datepicker_vol"  placeholder="Date">
                                        </div>
                                        <div class="search_btn">
                                            <button class="boxed-btn4 " type="submit" >Reserver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!-- where_togo_area_end  -->
    <div class="popular_places_area" style="padding-bottom:50px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Voyage Organise</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($VoyageOrganise as  $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset($item->photo)}}" alt="">
                            <a href="{{route('VoyageOrganiseController.ShowDetail',['voyageOrganise'=>$item->id])}}" class="prise">{{number_format($item->prixAdulte,0," .",",")}} DZ</a>
                        </div>
                        <div class="place_info">
                            <a href="{{route('VoyageOrganiseController.ShowDetail',['voyageOrganise'=>$item->id])}}"><h3>{{$item->ville->nom}}</h3></a>
                            <p>{{$item->ville->pays->nom}}</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
                                </span>
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="">{{$item->Nb_jour}} Jours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="{{route("VoyageOrganiseController.VoyageOrganise")}}">More Places</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Hotel</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($Hotel as  $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset($item->photo)}}" alt="">
                            <a href="{{route('HotelController.show',['Hotel'=>$item->id])}}" class="prise">
                                à partir de <br>
                                {{number_format($item->prix,0," .",",")}}  DZ
                            </a>
                        </div>
                        <div class="place_info">
                            <div class="rating_days d-flex">
                                <a href="{{route('HotelController.show',['Hotel'=>$item->id])}}" style="margin-right: 12px;">
                                    <h3>{{$item->nom}}</h3>
                                </a>
                                <span class="d-flex justify-content-center align-items-center">
                                    @for($i=0;$i<$item->etoile;$i++)
                                        <i class="fa fa-star"></i> 
                                     @endfor
                                </span>
                            </div>
                            <div class="rating_days d-flex justify-content-between">
                                <p>{{$item->ville->nom}} , {{$item->ville->pays->nom}}</p>
                                <div class="d-flex justify-content-center align-items-center listHotel">
                                    @foreach ($item->Options()->get() as $item)
                                        <i class="{{$item->code}}"></i>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="{{route("HotelController.Hotel")}}">More Hotel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Enjoy Video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- popular_destination_area_start  -->
       <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Popular Destination</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($billet as  $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="{{$item->photo}}" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">{{$item->ville->nom}} 
                                    <a href="{{route("BilletController.Billet",['id'=>$item->id])}}"> 
                                        à partir de 
                                        {{number_format($item->prix,0," .",",")}}  DZ 
                                    </a> 
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    <!-- testimonial_area  -->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Micky Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Tom Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Jerry Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


@endsection
@section('script')
<script>
    var url="{{route('PaysController.GetVillesJsonURL')}}/";
    $(function(){
        $('#datepicker').daterangepicker({
            singleDatePicker: true,
            startDate: moment(),
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
         $('#datepicker_hotel,#datepicker_vol').daterangepicker({
            startDate: moment(),
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
         
    })
    $('#datepicker_hotel,#datepicker_vol').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
    });
    $(document).on("change","#Type",function(){
        if($(this).val()=="0"){
            $('#datepicker_vol').daterangepicker({
                startDate: moment(),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        }else{
            $('#datepicker_vol').daterangepicker({
                singleDatePicker: true,
                startDate: moment(),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        }
    })
</script>
<script src="{{asset("js")}}/Ville.js"></script>
<script src="{{asset("js")}}/nice-select.min.js"></script>
@endsection



