@foreach ($Hotel as $item)
    <div class="col-lg-6 col-md-6">
        <div class="single_place">
            <div class="thumb">
                <img src="{{asset($item->photo)}}" alt="">
                <a href="{{route('HotelController.show',['Hotel'=>$item->id])}}" class="prise">
                    à partir de <br>
                    {{number_format($item->prix,0," .",",")}}  DZ
                </a>
            </div>
            <div class="place_info">
                <div class="rating_days d-flex">
                    <a href="{{route('HotelController.show',['Hotel'=>$item->id])}}" style="margin-right: 12px;">
                        <h3>{{$item->nom}}</h3>
                    </a>
                    <span class="d-flex justify-content-center align-items-center">
                        @for($i=0;$i<$item->etoile;$i++)
                            <i class="fa fa-star"></i> 
                         @endfor
                    </span>
                </div>
                <div class="rating_days d-flex justify-content-between">
                    <p>{{$item->ville->nom}} , {{$item->ville->pays->nom}}</p>
                    <div class="d-flex justify-content-center align-items-center listHotel">
                        @foreach ($item->Options()->get() as $item)
                            <i class="{{$item->code}}"></i>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
