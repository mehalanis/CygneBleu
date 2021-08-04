@foreach ($VoyageOrganise as $item)
    <div class="col-lg-6 col-md-6">
        <div class="single_place">
            <div class="thumb">
                <img src="{{asset($item->photo)}}" alt="">
                <a href="{{route('VoyageOrganiseController.ShowDetail',['voyageOrganise'=>$item->id])}}" class="prise">{{number_format($item->prixAdulte,0," .",",")}} DZ</a>
            </div>
            <div class="place_info">
                <a href="{{route('VoyageOrganiseController.ShowDetail',['voyageOrganise'=>$item->id])}}"><h3>{{$item->nom}}</h3></a>
                <p>{{$item->ville->nom}} , {{$item->ville->pays->nom}}</p>
                <div class="rating_days d-flex justify-content-between">
                    <span class="d-flex justify-content-center align-items-center">
                         <i class="fa fa-star"></i> 
                         <i class="fa fa-star"></i> 
                         <i class="fa fa-star"></i> 
                         <i class="fa fa-star"></i> 
                         <i class="fa fa-star"></i>
                         <a href="#">(20 Review)</a>
                    </span>
                    <div class="days">
                        <i class="fa fa-clock-o"></i>
                        <a href="">{{$item->Nb_jour}} Jours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
