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
@endsection
@section('content')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        @foreach ($voyageOrganise->getAllphotos() as $item)
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

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    {!!$voyageOrganise->description!!}
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Contact for join</h3>
                    <form action="{{route("VoyageOrganiseReservationController.store")}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="single_input">
                                    <select name="voyage_organise_date_id" id="" >
                                        @foreach ($voyageOrganise->VoyageOrganiseDate as $item)
                                         <option value="{{$item->id}}">
                                            Du {{$item->depart->format('d/m/Y')}} au {{$item->retour->format('d/m/Y')}}
                                         </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
