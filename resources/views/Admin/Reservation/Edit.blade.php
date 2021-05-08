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
                  <h3 class="card-title">Renseignements sur le client</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("VoyageOrganiseReservation.update",['VoyageOrganiseReservation'=>$voyageOrganiseReservation->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control" id="nom" value="{{$voyageOrganiseReservation->Client->nom}}" required placeholder="Enter nom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Nb_jour">Prenom</label>
                                        <input type="text" name="prenom" class="form-control" id="prenom" value="{{$voyageOrganiseReservation->Client->prenom}}" required placeholder="Enter prenom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pays">Pays</label>
                            <input type="text" name="adresse" class="form-control" id="adresse" value="{{$voyageOrganiseReservation->Client->adresse}}" required placeholder="Enter adresse">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" value="{{$voyageOrganiseReservation->Client->telephone}}" required placeholder="Enter adresse">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4 col-4">
                                        <div class="row" style="margin-left: 2px;">
                                            <div class="form-group">
                                            <p> <img src="{{asset("img")}}/logo/whatsapp-24px.png"/></p>
                                                <div class="custom-control custom-checkbox"> 
                                                    <input class="custom-control-input" type="checkbox" name="is_whatsapp"  value="1"  id="is_whatsapp" @if($voyageOrganiseReservation->Client->is_whatsapp=="1" ) checked @endif>
                                                    <label for="is_whatsapp" class="custom-control-label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <div class="row" style="justify-content: center;">
                                            <div class="form-group">
                                            <p> <img src="{{asset("img")}}/logo/icons8-viber-24.png"/></p>
                                                <div class="custom-control custom-checkbox"> 
                                                    <input class="custom-control-input" type="checkbox" name="is_viber"  value="1"  id="is_viber" @if($voyageOrganiseReservation->Client->is_viber=="1" ) checked @endif>
                                                    <label for="is_viber" class="custom-control-label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <div class="row" style="justify-content: center;">
                                            <div class="form-group">
                                            <p> <img src="{{asset("img")}}/logo/imo_24px.png"/></p>
                                                <div class="custom-control custom-checkbox"> 
                                                    <input class="custom-control-input" type="checkbox" name="is_imo"  value="1"  id="is_imo" @if($voyageOrganiseReservation->Client->is_imo=="1" ) checked @endif>
                                                    <label for="is_imo" class="custom-control-label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{$voyageOrganiseReservation->Client->email}}" required placeholder="Enter email">
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
                  <h3 class="card-title">Informations sur le voyage</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("VoyageOrganiseReservation.update",['VoyageOrganiseReservation'=>$voyageOrganiseReservation->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="Voyage">Voyage</label>
                                    <input type="text" name="Voyage" class="form-control" id="Voyage" value="{{$voyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->nom}}" required  disabled>
                                </div>
                            </div>
                            <div class="col-md-1" style="align-self: center;">
                                <a target="_blank"  href="{{route("VoyageOrganiseController.ShowDetail",["voyageOrganise"=>$voyageOrganiseReservation->VoyageOrganiseDate->voyage_organise_id])}}">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nb_Adulte">Adulte</label>
                                    <input type="text" name="nb_Adulte" class="form-control" id="nb_Adulte" value="{{$voyageOrganiseReservation->nb_Adulte}}" required  >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nb_Adolescente">Adolescente</label>
                                    <input type="text" name="nb_Adolescente" class="form-control" id="nb_Adolescente" value="{{$voyageOrganiseReservation->nb_Adolescente}}" required  >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nb_Enfant">Enfant</label>
                                    <input type="text" name="nb_Enfant" class="form-control" id="nb_Enfant" value="{{$voyageOrganiseReservation->nb_Enfant}}" required  >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Total">Total</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="Total" class="form-control" id="Total" value="{{$voyageOrganiseReservation->Total()}}" required  disabled style="text-align: right;">
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
                        <div class="form-group">
                            <label for="versements">versements</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="versements" class="form-control" id="versements" value="{{$voyageOrganiseReservation->versements}}" required  style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reduction">reduction</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="reduction" class="form-control" id="reduction" value="{{$voyageOrganiseReservation->reduction}}" required   style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sauvegarde</button>
                    </div>
                </form>
                <!-- /.card-body -->
              </div>
        </div>
      </div>
    </div>
  </section>

@endsection
