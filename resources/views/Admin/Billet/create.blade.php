@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/simplemde/simplemde.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

@endsection
@section('titre')
Billet
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("Billet.index")}}">Billet</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Billet</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("Billet.store")}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Pays depart</label>
                                    <select id="pays"  class="form-control" onchange="SelectVilles(this.value,'#ville_depart_id')">
                                        @foreach ($pays as $item)
                                         <option value="{{$item->id}}">{{$item->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Ville">Ville depart</label>
                                    <select id="ville_depart_id" name="ville_depart_id" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Pays arrivée</label>
                                    <select id="pays"  class="form-control" onchange="SelectVilles(this.value,'#ville_arrivee_id')">
                                        @foreach ($pays as $item)
                                         <option value="{{$item->id}}">{{$item->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Ville">Ville arrivée</label>
                                    <select id="ville_arrivee_id" name="ville_arrivee_id" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Type de billet</label>
                                    <select name="type_billet" class="form-control">
                                       <option value="1">Billet d'avion</option>
                                       <option value="2">Billet de bateau </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div id="VoyageOrganiseDate_list">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label >Aller / Retour</label>
                                        <select   id="0"  class="form-control aller_retour"  >
                                            <option value="0">A - R</option>
                                            <option value="1">Aller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="depart">Date Depart</label>
                                        <div class="input-group date" id="depart" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"  name="depart[]" data-target="#depart" data-toggle="datetimepicker"/>
                                            <div class="input-group-append" data-target="#depart" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="retour">Date Retour</label>
                                        <div class="input-group date" id="retour" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="retour_input_0"  name="retour[]" data-target="#retour" data-toggle="datetimepicker"/>
                                            <div class="input-group-append" data-target="#retour" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="type">type</label>
                                        <select name="type[]" id=""  class="form-control" >
                                            @foreach ($age as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group" name="">
                                        <label for="class">class</label>
                                        <select name="class[]" id=""  class="form-control" >
                                            @foreach ($class as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="max_personne">prix</label>
                                        <div class=" input-group mb-3">
                                            <input type="text" name="prix[]" class="form-control" id="prix" required placeholder="Enter Prix" style="text-align: right;">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00 DZ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for=""> </label>
                                        <div class=" input-group mb-3">
                                        <img src="{{asset("Admin")}}/img/Add24px.png" class="col-form-label" id="VoyageOrganiseDateAddRow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prixEnfant">Upload Photos</label>
                                    <input type="file"  class="form-control" name="photo" id="photo" onchange="previewFile(this);" required>
                                    <img id="previewImg" width="300" src="/examples/images/transparent.png" alt="Image Vide">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prixEnfant">Upload Photos</label>
                            <div class="input-images"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Pays">État</label>
                                    <select name="state" class="form-control">
                                       <option value="1">Activé</option>
                                       <option value="0">Désactivé</option>
                                    </select>
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
<div id="input"  style="display:none">
    <div class="row moinsRow">
        <div class="col-auto">
            <div class="form-group">
                <select   class="form-control aller_retour aller_retour_moins" >
                    <option value="0">A - R</option>
                    <option value="1">Aller</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="input-group date date_depart_moins" id="depart" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input date_depart_moins_input" name="depart[]" data-target="#depart" data-toggle="datetimepicker"/>
                    <div class="input-group-append date_depart_moins_icon" data-target="#depart" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="input-group date date_retour_moins" id="retour" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input date_retour_moins_input"  name="retour[]" data-target="#retour" data-toggle="datetimepicker"/>
                    <div class="input-group-append date_retour_moins_icon" data-target="#retour" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <select name="type[]" id=""  class="form-control" >
                    @foreach ($age as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group" >
                <select name="class[]" id=""  class="form-control" >
                    @foreach ($class as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class=" input-group mb-3">
                    <input type="text" name="prix[]" class="form-control" id="prix" required placeholder="Enter Prix" style="text-align: right;">
                    <div class="input-group-append">
                        <span class="input-group-text">.00 DZ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <img src="{{asset("Admin")}}/img/moins24px.png" class="col-form-label btnMoinsRow" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset("Admin")}}/plugins/moment/moment.min.js"></script>
<script src="{{asset("Admin")}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset("Admin")}}/dist/js/image-uploader.min.js"></script>
<script>
    $(function () {
      // Summernote
      $('#description').summernote()
      $('.input-images').imageUploader();
      $('#depart,#retour').datetimepicker({ icons: { time: 'far fa-clock' }, format: 'DD/MM/YYYY HH:mm ' });
    })
    SelectVilles("{{$pays[0]->id}}","#ville_depart_id");
    SelectVilles("{{$pays[0]->id}}","#ville_arrivee_id");
    function SelectVilles(pays_id,input){
        var url="{{route('PaysController.GetVillesJsonURL')}}/"+pays_id
        var request = $.ajax({
                                url: url,
                                method: "GET",
                                success: function(result){
                                    $(input).children().remove().end();
                                    for(var i in result){
                                        $(input).append("<option value='"+result[i].id+"'>"+result[i].nom +"</option>")
                                    }
                                }
                             });
    }
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
         $("#VoyageOrganiseDate_list").append(document.getElementById("input").innerHTML);
          InitMoinsRow();
         });
         $(document).on('click','.btnMoinsRow', function(){
          $("#moinsRow_"+$(this).attr('id')).remove();
          InitMoinsRow();
        });
        });
        var nbr=1;
        function InitMoinsRow() {
            var List=document.getElementsByClassName("moinsRow");
            var ListBtn=document.getElementsByClassName("btnMoinsRow");
            for(var i=0;i<List.length;i++){
                List[i].id="moinsRow_"+i;
                ListBtn[i].id=i;
            }
            var aller_retour_moins=document.getElementsByClassName("aller_retour_moins");
            var date_depart_moins=document.getElementsByClassName("date_depart_moins");
            var  date_depart_moins_input=document.getElementsByClassName("date_depart_moins_input");
            var date_depart_moins_icon=document.getElementsByClassName("date_depart_moins_icon");

            var date_retour_moins=document.getElementsByClassName("date_retour_moins");
            var  date_retour_moins_input=document.getElementsByClassName("date_retour_moins_input");
            var date_retour_moins_icon=document.getElementsByClassName("date_retour_moins_icon");

            var x=window.nbr;
            aller_retour_moins[List.length-2].id=x;
            date_depart_moins[List.length-2].id="depart_"+x
            date_retour_moins[List.length-2].id="retour_"+x

            date_depart_moins_input[List.length-2].dataset.target ="#depart_"+x
            date_retour_moins_input[List.length-2].dataset.target ="#retour_"+x
            date_retour_moins_input[List.length-2].id="retour_input_"+x;

            date_depart_moins_icon[List.length-2].dataset.target ="#depart_"+x
            date_retour_moins_icon[List.length-2].dataset.target ="#retour_"+x

            $('#depart_'+x).datetimepicker({ icons: { time: 'far fa-clock' }, format: 'DD/MM/YYYY HH:mm ' });
            $('#retour_'+x).datetimepicker({ icons: { time: 'far fa-clock' }, format: 'DD/MM/YYYY HH:mm ' });
            window.nbr++;
        }
        $(document).on("change",".aller_retour",function(){
            if($(this).val()=="1"){
                $("#retour_input_"+$(this).attr("id")).val("")
                $("#retour_input_"+$(this).attr("id")).attr("disabled","disabled")
            }else{
                $("#retour_input_"+$(this).attr("id")).removeAttr("disabled")

            }
        })
  </script>

@endsection
