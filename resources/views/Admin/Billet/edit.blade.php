@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('titre')
Edit Billet
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
                  <h3 class="card-title">Custom Elements</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("Billet.update",['Billet'=>$billet->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Pays</label>
                                    <select id="pays"  class="form-control" onchange="SelectVilles(this.value)">
                                        @foreach ($pays as $item)
                                         <option value="{{$item->id}}" @if($billet->ville->pays->id==$item->id) selected @endif>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Pays">Type de billet</label>
                                    <select name="type" class="form-control">
                                       <option value="1" @if($billet->type=="1") selected @endif>Billet d'avion</option>
                                       <option value="2"  @if($billet->type=="2") selected @endif>Billet de bateau </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tarif (à partir de)</label>
                                    <div class=" input-group mb-3">
                                        <input type="text" name="prix" class="form-control" required placeholder="Enter Tarif " value="{{$billet->prix}}" style="text-align: right;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00 DZ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Upload Photos</label>
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="previewFile(this);"  >
                                    <img id="previewImg" width="300" src="{{asset($billet->photo)}}" alt="Placeholder">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Photos</label>
                            <div class="input-images"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Pays">État</label>
                                    <select name="state" class="form-control">
                                       <option value="1" @if($billet->state=="1") selected @endif>Activé</option>
                                       <option value="0" @if($billet->state=="0") selected @endif>Désactivé</option>
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
@endsection
@section('script')
<script src="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset("Admin")}}/dist/js/image-uploader.min.js"></script>
<script src="{{asset("Admin")}}/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
      // Summernote
      $('#description').summernote()
      $('.input-images').imageUploader({
          "preloaded":[
            @foreach ($billet->getAllphotos() as $item)
              {
                  'id': {{$item->id}},
                  "src":"{{asset($item->photo) }}"
              },
              @endforeach
          ]
      });
     

    })
    SelectVilles("{{$billet->ville->pays->id}}");
    function SelectVilles(pays_id){
        var url="{{route('PaysController.GetVillesJsonURL')}}/"+pays_id
        var request = $.ajax({
                                url: url,
                                method: "GET",
                                success: function(result){
                                    $('#ville_id').children().remove().end();
                                    for(var i in result){
                                        if("{{$billet->ville->id}}"==result[i].id){
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
 
</script>
@endsection