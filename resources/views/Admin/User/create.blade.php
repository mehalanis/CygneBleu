@extends('layout.admin')
@section('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/plugins/simplemde/simplemde.min.css">
    <link rel="stylesheet" href="{{asset("Admin")}}/dist/css/image-uploader.min.css">
@endsection
@section('titre')
User
@endsection
@section('route')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="{{route("VoyageOrganise.index")}}">User</a></li>
@endsection
@section('content')
<!-- Main content -->
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">User</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route("User.store")}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name">Nom User</label>
                                        <input type="text" name="name" class="form-control" id="name" required placeholder="Enter Nom User">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="password" required placeholder="Enter Mot de passe">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Droit d'accès</label>
                                        <select name="droit"  class="form-control" id="droit">
                                            <option value="0">Administrateur</option>
                                            <option value="1">Vendeur</option>
                                            <option value="2">Partenaire</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none" id="budget_div">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="budget">Budget</label>
                                        <input type="text" name="budget" class="form-control" id="budget"  placeholder="Enter budget">
                                    </div>
                                </div>
                            </div>
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
@endsection
@section("script")
<script>
    $(document).on("change",'#droit',function(){
        if($(this).val()=="2"){
            $("#budget_div").css("display","");
        }else{
            $("#budget_div").css("display","none");
        }
    })
</script>
@endsection
