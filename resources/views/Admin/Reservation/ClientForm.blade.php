<div class="col-md-6">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Renseignements sur le client</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{route("Client.update",['Client'=>$Client->id])}}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" value="{{$Client->nom}}" required placeholder="Enter nom">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="Nb_jour">Prenom</label>
                                <input type="text" name="prenom" class="form-control" id="prenom" value="{{$Client->prenom}}" required placeholder="Enter prenom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" value="{{$Client->adresse}}" required placeholder="Enter adresse">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" name="telephone" class="form-control" id="telephone" value="{{$Client->telephone}}" required placeholder="Enter adresse">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="row" style="margin-left: 2px;">
                                    <div class="form-group">
                                    <p> <img src="{{asset("img")}}/logo/whatsapp-24px.png"/></p>
                                        <div class="custom-control custom-checkbox"> 
                                            <input class="custom-control-input" type="checkbox" name="is_whatsapp"  value="1"  id="is_whatsapp" @if($Client->is_whatsapp=="1" ) checked @endif>
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
                                            <input class="custom-control-input" type="checkbox" name="is_viber"  value="1"  id="is_viber" @if($Client->is_viber=="1" ) checked @endif>
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
                                            <input class="custom-control-input" type="checkbox" name="is_imo"  value="1"  id="is_imo" @if($Client->is_imo=="1" ) checked @endif>
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
                    <input type="text" name="email" class="form-control" id="email" value="{{$Client->email}}" required placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control"  cols="30" rows="2" placeholder="Vide">{{$Client->message}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sauvegarde</button>
            </div>
        </form>
        <!-- /.card-body -->
      </div>
</div>
