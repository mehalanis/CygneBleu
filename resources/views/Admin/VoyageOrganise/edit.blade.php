@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/simplemde/simplemde.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
@endsection
@section('titre')
Voyage Organise
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("VoyageOrganise.index")}}">Voyage Organise</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Custom Elements</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("VoyageOrganise.update",['VoyageOrganise'=>$voyageOrganise->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom">Titre</label>
                                        <input type="text" name="nom" class="form-control" id="nom" value="{{$voyageOrganise->nom}}" required placeholder="Enter Titre">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Nb_jour">Nbjour</label>
                                        <input type="text" name="Nb_jour" class="form-control" id="Nb_jour" value="{{$voyageOrganise->Nb_jour}}" required placeholder="Enter Numero">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Pays</label>
                                    <select id="pays"  class="form-control" onchange="SelectVilles(this.value)">
                                        @foreach ($pays as $item)
                                         <option value="{{$item->id}}" @if($voyageOrganise->ville->pays->id==$item->id) selected @endif>
                                            {{$item->nom}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Ville">Ville</label>
                                    <select id="ville_id" name="ville_id" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="description" id="description">
                                {{$voyageOrganise->description}}
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prixAdulte">Tarif Adulte</label>
                                    <div class=" input-group mb-3">
                                        <input type="text" name="prixAdulte" class="form-control" id="prixAdulte" value="{{$voyageOrganise->prixAdulte}}"  required placeholder="Enter Tarif Adulte" style="text-align: right;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00 DZ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prixAdolescente">Tarif Adolescente</label>
                                    <div class=" input-group mb-3">
                                        <input type="text" name="prixAdolescente" class="form-control" id="prixAdolescente" value="{{$voyageOrganise->prixAdolescente}}" required placeholder="Enter Tarif Adolescente" style="text-align: right;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00 DZ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prixEnfant">Tarif Enfant</label>
                                    <div class=" input-group mb-3">
                                        <input type="text" name="prixEnfant" class="form-control" id="prixEnfant" value="{{$voyageOrganise->prixEnfant}}" required placeholder="Enter Tarif Enfant" style="text-align: right;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00 DZ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="depart">Date Depart</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="retour">Date Retour</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="max_personne">Nbr max personne</label>
                                </div>
                            </div>
                        </div>
                        <div id="VoyageOrganiseDate_list">
                            @php $isfirst=true; @endphp
                            @foreach ($voyageOrganise->VoyageOrganiseDate as $item)
                            <div class="row @if(!$isfirst) moinsRow @endif">
                                <input type="hidden" name="VoyageOrganiseDate_id[]" value="{{$item->id}}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" name="depart[]" class="form-control" id="depart" value="{{$item->depart->format('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" name="retour[]" class="form-control" id="retour" value="{{$item->retour->format('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" name="max_personne[]" class="form-control" id="max_personne" value="{{$item->max_personne}}">
                                    </div>
                                </div>
                                @if($isfirst)
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <img src="{{asset("Admin")}}/img/Add24px.png" class="col-form-label" id="VoyageOrganiseDateAddRow">
                                    </div>
                                </div>
                                    @php $isfirst=!$isfirst; @endphp
                                @else
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <img src="{{asset("Admin")}}/img/moins24px.png" class="col-form-label btnMoinsRow" alt="">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prixEnfant">Upload Photos</label>
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="previewFile(this);" >
                                    <img id="previewImg" width="300" src="{{asset($voyageOrganise->photo)}}" alt="Placeholder">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prixEnfant">Upload Photos</label>
                            <div class="input-images"></div>
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
  <div id="VoyageOrganise_input"  style="display:none">
    <div class="row moinsRow">
        <input type="hidden" name="VoyageOrganiseDate_id[]" value="-1">
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="depart[]" class="form-control" id="depart" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="retour[]" class="form-control" id="retour" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type="number" name="max_personne[]" class="form-control" id="max_personne" required>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <img src="{{asset("Admin")}}/img/moins24px.png" class="col-form-label btnMoinsRow" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset("Admin")}}/dist/js/image-uploader.min.js"></script>
<script>
    $(function () {
      // Summernote
      $('#description').summernote()
      $('.input-images').imageUploader({
          "preloaded":[
            @foreach ($voyageOrganise->getAllphotos() as $item)
              {
                  'id': {{$item->id}},
                  "src":"{{asset($item->photo) }}"
              },
              @endforeach
          ]
      });
    })
    SelectVilles("{{$voyageOrganise->ville->pays->id}}");
    function SelectVilles(pays_id){
        var url="{{route('PaysController.GetVillesJsonURL')}}/"+pays_id
        var request = $.ajax({
                                url: url,
                                method: "GET",
                                success: function(result){
                                    $('#ville_id').children().remove().end();
                                    for(var i in result){
                                        if("{{$voyageOrganise->ville->id}}"==result[i].id){
                                            $('#ville_id').append("<option selected value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                        }else{
                                            $('#ville_id').append("<option value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                        }
                                    }
                                }
                             });
    }
  </script>
  <script>
    function previewFile(input){
        var file = $("#photo").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function() {
        $("#VoyageOrganiseDateAddRow").click(function(){
            $("#VoyageOrganiseDate_list").append(document.getElementById("VoyageOrganise_input").innerHTML);
            InitMoinsRow();
         });
         $(document).on('click','.btnMoinsRow', function(){
            $("#moinsRow_"+$(this).attr('id')).remove();
            InitMoinsRow();
        });
    });
    function InitMoinsRow() {
        var List=document.getElementsByClassName("moinsRow");
        var ListBtn=document.getElementsByClassName("btnMoinsRow");
        for(var i=0;i<List.length;i++){
            List[i].id="moinsRow_"+i;
             ListBtn[i].id=i;
        }
    }
    InitMoinsRow();
</script>
@endsection