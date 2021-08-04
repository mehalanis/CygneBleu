@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('titre')
Hotel
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("Hotel.index")}}">Hotel</a></li>
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
                <form action="{{route("Hotel.update",['Hotel'=>$hotel->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control" id="nom" required placeholder="Enter Titre" value="{{$hotel->nom}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="etoile">Étoile</label>
                                        <select id="etoile" name="etoile" class="form-control">
                                            <option value="1" @if($hotel->etoile=="1") selected @endif>1</option>
                                            <option value="2" @if($hotel->etoile=="2") selected @endif>2</option>
                                            <option value="3" @if($hotel->etoile=="3") selected @endif>3</option>
                                            <option value="4" @if($hotel->etoile=="4") selected @endif>4</option>
                                            <option value="5" @if($hotel->etoile=="5") selected @endif>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="prix">Prix à partir de</label>
                                        <div class=" input-group mb-3">
                                            <input type="text" name="prix" class="form-control" id="prix" required placeholder="Enter Titre" value="{{$hotel->prix}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00 DZ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" name="adresse" class="form-control" id="adresse" required placeholder="Enter adresse" value="{{$hotel->adresse}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Pays">Pays</label>
                                    <select id="pays"  class="form-control" onchange="SelectVilles(this.value)">
                                        @foreach ($pays as $item)
                                         <option value="{{$item->id}}" @if($hotel->ville->pays->id==$item->id) selected @endif>
                                            {{$item->nom}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Ville">Ville</label>
                                    <select id="ville_id" name="ville_id" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Adresse email</label>
                                    <input type="text" name="email" class="form-control" id="email" required placeholder="Enter Email" value="{{$hotel->email}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" required placeholder="Enter telephone" value="{{$hotel->telephone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" name="fax" class="form-control" id="fax" required placeholder="Enter fax" value="{{$hotel->fax}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="description" id="description">
                               {{$hotel->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">les équipements</label>
                            <select class="select2" id="equipements" name="equipements[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                @foreach ($option as $item)
                                    <option value="{{$item->id}}">{{$item->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Upload Photos</label>
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="previewFile(this);"  >
                                    <img id="previewImg" width="300" src="{{asset($hotel->photo)}}" alt="Placeholder">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Photos</label>
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
            @foreach ($hotel->getAllphotos() as $item)
              {
                  'id': {{$item->id}},
                  "src":"{{asset($item->photo) }}"
              },
              @endforeach
          ]
      });
      var selectedItems =[];
      @foreach ($hotel->Options()->get() as $item)
            selectedItems.push({{$item->id}});
      @endforeach

      $('.select2').select2()
      

    $(".select2").val(selectedItems).trigger("change");

    })
    SelectVilles("{{$hotel->ville->pays->id}}");
    function SelectVilles(pays_id){
        var url="{{route('PaysController.GetVillesJsonURL')}}/"+pays_id
        var request = $.ajax({
                                url: url,
                                method: "GET",
                                success: function(result){
                                    $('#ville_id').children().remove().end();
                                    for(var i in result){
                                        if("{{$hotel->ville->id}}"==result[i].id){
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