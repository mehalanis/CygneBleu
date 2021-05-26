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
                                    <input type="number" name="nb_Adulte" class="form-control" id="nb_Adulte" value="{{$voyageOrganiseReservation->nb_Adulte}}" required  >
                                    <input type="hidden" name="prixAdulte" id="prixAdulte" value="{{$voyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->prixAdulte}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nb_Adolescente">Adolescente</label>
                                    <input type="number" name="nb_Adolescente" class="form-control" id="nb_Adolescente" value="{{$voyageOrganiseReservation->nb_Adolescente}}" required  >
                                    <input type="hidden" name="prixAdolescente" id="prixAdolescente" value="{{$voyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->prixAdolescente}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nb_Enfant">Enfant</label>
                                    <input type="number" name="nb_Enfant" class="form-control" id="nb_Enfant" value="{{$voyageOrganiseReservation->nb_Enfant}}" required  >
                                    <input type="hidden" name="prixEnfant" id="prixEnfant" value="{{$voyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->prixEnfant}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Total">La Somme</label>
                            <div class=" input-group mb-3">
                                <input type="text" name="somme" class="form-control" id="somme"  required  disabled style="text-align: right;">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00 DZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_paid">Paiement</label>
                            <select name="is_paid" class="form-control" id="is_paid">
                                <option value="-1" @if($voyageOrganiseReservation->is_paid=="-1") selected @endif >Pas encore payé</option>
                                <option value="1" @if($voyageOrganiseReservation->is_paid=="1") selected @endif >payé</option>
                            </select>
                        </div>
                        <div class="form-group" id="versements_input">
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
        @include("Admin.Reservation.ClientForm",["Client"=>$voyageOrganiseReservation->Client])
        
      </div>
    </div>
  </section>

@endsection
@section('script')
<script>
    $(function () {
        calcule();
    })
    $("#nb_Adulte,#nb_Adolescente,#nb_Enfant,#reduction,#versements").keyup(function() {
        calcule();
    });
    $("#is_paid").change(function() {
        InitPaid();
    })
    function InitPaid(){
        if($("#is_paid option:selected").val()=="1"){
            $("#versements_input").hide()
            $("#versements").val(0)
            $("#PasEncorePaye_input").hide()
            $("#PasEncorePaye").val(0)
            
        }else{
            $("#versements_input").show()
            $("#PasEncorePaye_input").show()
        }
    }
    function PasEncorePaye(){
        return somme()-$("#versements").val()-$("#reduction").val()
    }
    function somme(){
        return $("#prixAdulte").val()* $("#nb_Adulte").val()
                        +$("#prixAdolescente").val()* $("#nb_Adolescente").val()
                        +$("#prixEnfant").val()* $("#nb_Enfant").val();
    } 
    function Total(){
        return somme()-$("#reduction").val();
    }    
    function calcule(){
        $("#somme").val(somme())
        $("#Total").val(Total())
        $("#PasEncorePaye").val(PasEncorePaye())
        InitPaid()
    }
</script> 
@endsection