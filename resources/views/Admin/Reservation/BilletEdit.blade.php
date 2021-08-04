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
                  <h3 class="card-title">Informations sur la Reservation</h3>
                </div>
                <!-- /.card-header -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label for="Billet">Billet</label>
                                    <input type="text" class="form-control" id="Voyage" value="{{$billetReservation->billetDate->billet->villeDepartId->nom}} To {{$billetReservation->billetDate->billet->villeArriveeId->nom}} ( Aller @if($billetReservation->billetDate->retour ) / Retour @endif)" required  disabled>
                                </div>
                            </div>
                            <div class="col-md-1" style="align-self: center;">
                                <a target="_blank"  href="{{route("BilletController.Billet",["id"=>$billetReservation->billetDate->billet->id])}}">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Billet">Type</label>
                                    <select name="" id="" class="form-control">
                                        @foreach ($age as $key=>$val)
                                            <option value="{{ $key }}" @if($billetReservation->billetDate->type==$key) selected @endif>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Billet">Billet</label>
                                    <select name="" id="" class="form-control">
                                        @foreach ($class as $key=>$val)
                                            <option value="{{ $key }}" @if($billetReservation->billetDate->class==$key) selected @endif>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Total">La somme</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="somme" class="form-control" id="somme" value="{{$billetReservation->billetDate->prix}}"  required  disabled style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_paid">Paiement</label>
                            <select name="is_paid" class="form-control" id="is_paid">
                                <option value="-1" @if($billetReservation->is_paid=="-1") selected @endif >Pas encore payé</option>
                                <option value="1" @if($billetReservation->is_paid=="1") selected @endif >payé</option>
                            </select>
                        </div>
                        <div class="form-group" id="versements_input">
                            <label for="versements">versements</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="versements" class="form-control" id="versements" value="{{$billetReservation->versements}}" required  style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reduction">reduction</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="reduction" class="form-control" id="reduction" value="{{$billetReservation->reduction}}" required   style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="PasEncorePaye_input">
                            <label for="PasEncorePayé" title="La somme - ( versements + reduction )">Montant Pas encore payé</label>
                            <div class=" input-group mb-3">
                                <input type="text"  class="form-control" id="PasEncorePaye" required   style="text-align: right;" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Total" title="La somme - reduction">Total</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="Total" class="form-control" id="Total" value="" required  disabled style="text-align: right;">
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
        @include("Admin.Reservation.ClientForm",["Client"=>$billetReservation->Client])
      </div>
    </div>
  </section>

@endsection
