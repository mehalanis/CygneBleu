@extends('layout.app')
@section('head')
    <style>
        .nice-select{
            width: 100%;
            margin-bottom:20px;
            background: #F4F4F4;
        }
        .list{
            width: 100%;
            margin-top:1px;
        }
    </style>
      <link rel="stylesheet" href="{{asset("Admin")}}/plugins/daterangepicker/daterangepicker.css">

@endsection
@section('content')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        @foreach ($hotel->getAllphotos() as $item)
        <div class="single_slider  d-flex align-items-center overlay" style="background-image: url({{$item->photo}})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="where_togo_area" style="padding: 24px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="form_area row" style="margin-left: 0.5px;">
                    <h3 >
                        <span  class="d-flex justify-content-center align-items-center" style="font-size: 24px;">
                            @for($i=0;$i<$hotel->etoile;$i++)
                                <i class="fa fa-star" style="color:#FDAE5C"></i>
                            @endfor
                        </span>
                        {{$hotel->nom}}
                    </h3>
                </div>
            </div>

            <div class="col-auto">
                <div class="form_area row" style="padding: 8px;">
                    <span style="margin-right: 8px" class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-phone"  style="color:#fff"></i>
                    </span>
                    <h4>{{$hotel->telephone}}</h4>
                </div>
            </div>
            <div class="col-auto ">
                <div class="form_area row" style="padding: 8px;">
                    <span style="margin-right: 8px" class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-map-marker"  style="color:#fff"></i>
                    </span>
                    <h4>{{$hotel->adresse}} , {{$hotel->ville->nom}} , {{$hotel->ville->pays->nom}}</h4>
                </div>
            </div>
            <div class="col-auto">
                <div class="form_area row" style="padding: 8px;">
                    <span style="margin-right: 8px" class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-at"  style="color:#fff"></i>
                    </span>
                    <h4>{{$hotel->email}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    {!!$hotel->description!!}
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Contact for join</h3>
                    <form action="{{route("HotelReservationController.store")}}" method="POST">
                        @csrf
                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" name="nom" placeholder="Votre Nom *" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" name="prenom" placeholder="Votre Prenom *" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <input type="text" name="adresse" placeholder="Votre Adresse">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_input">
                                    <input type="text" name="telephone" placeholder="Votre Numero Telephone *" required>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4">
                                <div class="row" style="margin-left: 2px;">
                                    <div class="form-group">
                                    <p>Whatsapp <img src="{{asset("img")}}/logo/whatsapp-24px.png"/></p>
                                        <div class="confirm-switch">
                                            <input type="checkbox" id="is_whatsapp" name="is_whatsapp" value="1">
                                            <label for="is_whatsapp"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4">
                                <div class="row" style="justify-content: center;">
                                    <div class="form-group">
                                    <p>Vibre <img src="{{asset("img")}}/logo/icons8-viber-24.png"/></p>
                                        <div class="confirm-switch">
                                            <input type="checkbox" id="Vibre" name="is_viber" value="1">
                                            <label for="Vibre"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4">
                                <div class="row" style="justify-content: center;">
                                    <div class="form-group">
                                    <p>Imo <img src="{{asset("img")}}/logo/imo_24px.png"/></p>
                                        <div class="confirm-switch">
                                            <input type="checkbox" id="Imo" name="is_imo" value="1">
                                            <label for="Imo"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <input type="text" name="email" placeholder="Votre Adresse email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_input">
                                    <select name="nb_chambre" id="">
                                        <option value="1">1 Chambre</option>
                                        <option value="2">2 Chambre</option>
                                        <option value="3">3 Chambre</option>
                                        <option value="4">4 Chambre</option>
                                        <option value="5">5 Chambre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input type="text" name="reservation" name="reservation" id="reservation">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single_input">
                                    <select name="nb_Adulte" id="">
                                        <option value="1">1 Adulte</option>
                                        <option value="2">2 Adulte</option>
                                        <option value="3">3 Adulte</option>
                                        <option value="4">4 Adulte</option>
                                        <option value="5">5 Adulte</option>
                                        <option value="6">6 Adulte</option>
                                        <option value="7">7 Adulte</option>
                                        <option value="8">8 Adulte</option>
                                        <option value="9">9 Adulte</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single_input">
                                    <select name="nb_Adolescente" id="">
                                        <option value="0">0 Adolescente</option>
                                        <option value="1">1 Adolescente</option>
                                        <option value="2">2 Adolescente</option>
                                        <option value="3">3 Adolescente</option>
                                        <option value="4">4 Adolescente</option>
                                        <option value="5">5 Adolescente</option>
                                        <option value="6">6 Adolescente</option>
                                        <option value="7">7 Adolescente</option>
                                        <option value="8">8 Adolescente</option>
                                        <option value="9">9 Adolescente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single_input">
                                    <select name="nb_Enfant" id="">
                                        <option value="0">0 Enfant</option>
                                        <option value="1">1 Enfant</option>
                                        <option value="2">2 Enfant</option>
                                        <option value="3">3 Enfant</option>
                                        <option value="4">4 Enfant</option>
                                        <option value="5">5 Enfant</option>
                                        <option value="6">6 Enfant</option>
                                        <option value="7">7 Enfant</option>
                                        <option value="8">8 Enfant</option>
                                        <option value="9">9 Enfant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="single_input">
                                    <textarea name="message" id="" cols="30" rows="10"placeholder="Message" ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit">submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- newletter_area_start  -->
  <div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="Your mail" >
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit" >Subscribe</button>
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
<!-- newletter_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>More Places</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{asset("img")}}/place/1.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="#"><h3>California</h3></a>
                        <p>United State of America</p>
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
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{asset("img")}}/place/2.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="#"><h3>Korola Megna</h3></a>
                        <p>United State of America</p>
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
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{asset("img")}}/place/3.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="#"><h3>London</h3></a>
                        <p>United State of America</p>
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
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset("Admin")}}/plugins/moment/moment.min.js"></script>
<script src="{{asset("Admin")}}/plugins/daterangepicker/daterangepicker.js"></script>
<script>
    $('#reservation').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
         }
    })
</script>
@endsection
