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
        @foreach ($billet->getAllphotos() as $item)
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
<div class="where_togo_area" style="padding: 8px">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-auto">
                <div class="form_area row" style="padding: 8px;padding-right: 0px;">
                    <h4>{{$billet->villeDepartId->nom}}</h4>
                    <span style="margin-left: 8px" class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-plane-departure"  style="color:#fff"></i>
                    </span>
                </div>
            </div>
            <div class="col-auto">
                <div class="form_area row" style="">
                    <img src="{{asset('img')}}/route_2.png" alt="" width="100">
                </div>
            </div>
            <div class="col-auto">
                <div class="form_area row" style="padding: 8px;">
                    <span style="margin-right: 8px" class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-plane-arrival"  style="color:#fff"></i>

                    </span>
                    <h4>{{$billet->villeArriveeId->nom}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="contact_join">
                    <h3>Contact for join</h3>
                    <form action="{{route("BilletReservation.store")}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <select name="" id="class">
                                        @foreach ($class as $key => $val)
                                            <option value="{{ $key }}"> {{ $val }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <select name="" id="age">
                                        @foreach ($age as $key => $val)
                                            <option value="{{ $key }}"> {{ $val }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">
                                <div class="single_input">
                                    <select name="" id="billet_type" >
                                        <option value="0">Aller - Retour</option>
                                        <option value="1">Aller Simple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="single_input">
                                    <select name="billet_date_id" id="billet_date_id" >

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <input type="text" name="" disabled value="Total : " id="total">
                                </div>
                            </div>
                            <!--<div class="col-lg-12">
                                <div class="single_input">
                                    <select name="nb_persone" id="nb_persone">
                                        <option value="1">1 Personne </option>
                                        <option value="2">2 Personne </option>
                                        <option value="3">3 Personne</option>
                                        <option value="4">4 Personne</option>
                                        <option value="5">5 Personne</option>
                                        <option value="6">6 Personne</option>
                                        <option value="7">7 Personne</option>
                                        <option value="8">8 Personne</option>
                                        <option value="9">9 Personne</option>
                                    </select>
                                </div>
                            </div>-->
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
                                    <textarea name="message" id="" cols="30" rows="10"placeholder="Message" ></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="billet_id" value='{{$billet->id}}'>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit" id="submit_btn">submit</button>
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
                                        <button class="boxed-btn4"  type="submit" >Subscribe</button>
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
<script>
    var billet_id="{{ $billet->id }}";
    var billet_date;
    UpdateBillet()
    $(document).on("change","#class,#age,#billet_type",function(){
        UpdateBillet()
    })
    function UpdateBillet(){
        $.ajax({
                url: "{{ route('BilletController.GetDateBilletJson') }}",
                datatype: "html",
                type: "get",
                data:{
                    billet_id:window.billet_id,"billet_type":$("#billet_type").val(),"type":$("#age").val(),"class":$("#class").val()}
            })
            .done(function (response) {
                $("#billet_date_id").children().remove().end();
                if(response.length ==0){
                    $("#total").val("Total : 0 DZ")
                    $("#billet_date_id").append("<option >N'est pas disponible pour le moment</option>")
                    $('#billet_date_id').niceSelect('update');
                    $('#submit_btn').attr("disabled","disabled");
                    $('#submit_btn').css('cursor', 'not-allowed')
                    return;
                }

                for(var i in response){
                    if($("#billet_type").val()=="0"){
                        $("#billet_date_id").append("<option value='"+response[i].id+"'> Aller "+response[i].depart+" - retour "+response[i].retour+"</option>")
                    }else{
                        $("#billet_date_id").append("<option value='"+response[i].id+"'> Aller "+response[i].depart+"</option>")
                    }
                }
                $("#total").val("Total : "+response[0].prix+" DZ")
                $('#submit_btn').removeAttr("disabled")
                $('#submit_btn').css('cursor', 'pointer')
                window.billet_date=response;
                $('#billet_date_id').niceSelect('update');
               console.log(response)
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endsection
