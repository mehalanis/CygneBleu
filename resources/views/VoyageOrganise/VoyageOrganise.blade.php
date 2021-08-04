@extends('layout.app')
@section('head')
<link rel="stylesheet" href="{{asset("css")}}/ion.rangeSlider.css">

@endsection
@section('content')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Voyage Organisé</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    <div class="popular_places_area" style="padding-top: 48px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="filter_result_wrap">
                        <h3>Filter Result</h3>
                        <div class="filter_bordered">
                            <div class="filter_inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <select id='pays' onchange="SelectVilles(this.value)">
                                                {{$is_pays=false}}
                                                <option data-display="All Country" value="0">All Country</option>
                                                @foreach ($pays as $item)
                                                    <option value="{{$item->id}}" @if($request->pays==$item->id) selected {{$is_pays=true}} @endif>{{$item->nom}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <select id='ville'>
                                                <option data-display="All Villes" value="0">All Villes</option>
                                                
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="range_slider_wrap">
                                            <span class="range">Prise range</span>
                                            <p>
                                                <input type="text" id="amount" readonly style="border:0; color:#7A838B; font-weight:400;">
                                            </p>
                                            <input type="hidden" id="from" value="1000">
                                            <input type="hidden" id="to" value="140000">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="reset_btn">
                                <button class="boxed-btn4" id="Reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row" id="VoyageOrganise">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <button class="boxed-btn4" id="More_Places" href="#"> More Places</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset("js")}}/ion.rangeSlider.min.js"></script>
<script src="{{asset("js")}}/Ville.js"></script>
<script>
    $("#amount").ionRangeSlider({
        type: "double",
        min: 1000,
        max: 140000,
        from: 1000,
        to: 140000,
        step:1000,
        prefix :" DZ ",
        grid: true,
        onChange: function (data) {    
          $("#from").val(data.from);
          $("#to").val(data.to);
        },
    });
    var url="{{route('PaysController.GetVillesJsonURL')}}/";
</script>
<script>
    var page = 1;
    SelectVilles("{{$request->pays}}","{{$request->ville}}");
    infinteLoadMore();
    $( "#More_Places" ).click(function() {
        infinteLoadMore();
    });
    $("#Reset").click(function() {
        $('#VoyageOrganise').empty();
        window.page=1;
        infinteLoadMore();
    });
    function infinteLoadMore() {
        var pays="&pays="+$('#pays').val();
        var ville="&ville="+$('#ville').val();
        var from="&from="+$('#from').val();
        var to="&to="+$('#to').val();
        $.ajax({
                url: "{{ route('VoyageOrganiseController.GetVoyageOrganise') }}?page=" + window.page+pays+ville+from+to,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                   // $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.html.length == 0) {
                  //  $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                window.page++;
                $("#VoyageOrganise").append(response.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }

</script>
@endsection