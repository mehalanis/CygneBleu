@extends('layout.admin')
@section('titre')
General Settings
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("GeneralSetting.index")}}">General Settings</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Custom Elements</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("GeneralSetting.store")}}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class='row'>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone</label>
                                    <input type="text" name="Telephone_1" class="form-control" id="Telephone_1" value="{{$GeneralSetting->Telephone_1}}" placeholder="Enter Numero Telephone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone (Deuxième)</label>
                                    <input type="text" name="Telephone_2" class="form-control" id="Telephone_2" value="{{$GeneralSetting->Telephone_2}}" placeholder="Enter Numero Telephone ">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fix</label>
                            <input type="text" name="Fix" class="form-control" id="Fix" value="{{$GeneralSetting->Fix}}" placeholder="Enter Numero Fix">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="Email" class="form-control" id="Email" value="{{$GeneralSetting->Email}}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse</label>
                            <input type="text" name="Adresse" class="form-control" id="Adresse" value="{{$GeneralSetting->Adresse}}" placeholder="Enter Adresse">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="facebook" value="{{$GeneralSetting->facebook}}" placeholder="Exemple : https://www.facebook.com/........">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" value="{{$GeneralSetting->instagram}}" placeholder="Exemple : https://www.instagram.com/........">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="twitter" value="{{$GeneralSetting->twitter}}" placeholder="Exemple : https://www.twitter.com/........">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Youtube</label>
                            <input type="text" name="youtube" class="form-control" id="youtube" value="{{$GeneralSetting->youtube}}" placeholder="Exemple : https://www.youtube.com/c/........">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sauvegarde</button>
                    </div>
                </form>
                <!-- /.card-body -->
              </div>
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Custom Elements</h3>
                </div>
                <div class="card-body">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;"> </div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: 36.786916,
                            lng: 3.245455
                        };
                        
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: 36.7867573,
                                lng: 3.2459046
                            },
                            zoom: 18,
                            scrollwheel: false
                        });
                        const marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                          });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_KEY")}}&amp;callback=initMap">
                </script>

            </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

@endsection