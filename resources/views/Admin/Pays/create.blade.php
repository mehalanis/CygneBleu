@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/simplemde/simplemde.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
@endsection
@section('titre')
Ajouter Pays && Ville
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("VoyageOrganise.index")}}">Pays && Ville</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Ajouter Pays && Ville</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("Pays.store")}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom">Nom Pays</label>
                                        <input type="text" name="nom" class="form-control" id="nom" required placeholder="Enter Nom Pays">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="depart">Ville</label>
                                </div>
                            </div>
                            
                        </div>
                        <div id="VoyageOrganiseDate_list">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Villes[]" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <img src="{{asset("Admin")}}/img/Add24px.png" class="col-form-label" id="VoyageOrganiseDateAddRow">
                                    </div>
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
<div id="VoyageOrganise_input"  style="display:none">
    <div class="row moinsRow">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="Villes[]" class="form-control" required>
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
<script>
    $(function () {
      // Summernote
      $('#description').summernote()
    })
   
  </script>
  <script>
    
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
</script>
@endsection