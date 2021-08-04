@extends('layout.admin')
@section('head')

@endsection
@section('titre')
Reservation
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("VoyageOrganise.index")}}">Reservation</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Informations sur l'hotel</h3>
                </div>
                <!-- /.card-header -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="Voyage">Hotel</label>
                                    <input type="text" name="Voyage" class="form-control" id="Voyage" value="{{$hotelReservation->Hotel->nom}}" required  disabled>
                                </div>
                            </div>
                            <div class="col-md-1" style="align-self: center;">
                                <a target="_blank"  href="{{route("HotelController.show",["Hotel"=>$hotelReservation->Hotel->id])}}">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nb_chambre">Nbr Chambre</label>
                                    <input type="text" name="nb_chambre" class="form-control" id="nb_chambre" value="{{$hotelReservation->nb_chambre}}" required  >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nb_Adulte">Adulte</label>
                                    <input type="text" name="nb_Adulte" class="form-control" id="nb_Adulte" value="{{$hotelReservation->nb_Adulte}}" required  >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nb_Adolescente">Adolescente</label>
                                    <input type="text" name="nb_Adolescente" class="form-control" id="nb_Adolescente" value="{{$hotelReservation->nb_Adolescente}}" required  >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nb_Enfant">Enfant</label>
                                    <input type="text" name="nb_Enfant" class="form-control" id="nb_Enfant" value="{{$hotelReservation->nb_Enfant}}" required  >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="total">Total</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="total" class="form-control" id="total" value="{{$hotelReservation->total}}"   >
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_paid">Paiement</label>
                            <select name="is_paid" class="form-control" id="">
                                <option value="-1">Pas encore payé</option>
                                <option value="1">payé</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sauvegarde</button>
                    </div>
                </form>
                <!-- /.card-body -->
              </div>
        </div>
        @include("Admin.Reservation.ClientForm",["Client"=>$hotelReservation->Client])
      </div>
    </div>
  </section>

@endsection
