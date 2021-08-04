<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\HotelReservation;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;

class HotelReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.Reservation.Hotel");
    }
    public function datatables()
    {   
        $Client=Client::select("clients.*","hotel_reservations.id as hotel_reservations_id")->join("hotel_reservations","clients.id","=","hotel_reservations.client_id")->get();
        return Datatables::of($Client)->editColumn('nom', function(Client $data) {
            return $data->nom." ".$data->prenom;
        })
        ->addColumn('NomHotel', function(Client $data) {
            return $data->HotelReservation->Hotel->nom;
        })
        ->addColumn('Ville', function(Client $data) {
            return $data->HotelReservation->Hotel->ville->nom;
         })->addColumn('action', function(Client $data) {
            $btnView='<a href="'.route("HotelReservation.edit",['HotelReservation'=>$data->hotel_reservations_id]).'" class="btn btn-block btn-primary">View</button>';
            return "<div class='action-list'>".$btnView."</div>";
            
        })->rawColumns(['action'])->toJson(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Client=Client::create([
            "nom"=>$request->input("nom"),
            "prenom"=>$request->input("prenom"),
            "adresse"=>$request->input("adresse"),
            "telephone"=>$request->input("telephone"),
            "is_whatsapp"=>$request->input("is_whatsapp") ?? "-1",
            "is_viber"=>$request->input("is_viber") ?? "-1",
            "is_imo"=>$request->input("is_imo") ?? "-1",
            "email"=>$request->input("email"),
            "message"=>$request->input("message")
        ]);
        $date=explode(" - ",$request->input("reservation"));
        HotelReservation::create([
            'hotel_id'=>$request->input("hotel_id"),
            "client_id"=>$Client->id,
            "nb_chambre"=>$request->input("nb_chambre"),
            "nb_Adulte"=>$request->input("nb_Adulte"),
            "nb_Adolescente"=>$request->input("nb_Adolescente"),
            "nb_Enfant"=>$request->input("nb_Enfant"),
            "debut"=>Carbon::createFromFormat('d/m/Y', $date[0])->format('Y-m-d'),
            "fin"=>Carbon::createFromFormat('d/m/Y', $date[1])->format('Y-m-d'),
        ]);
        Session::flash("Etat","Felicitation ! ");
        Session::flash("Message","votre réservation a été effectuée avec succès");
        return  view("Message");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReservation $hotelReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function edit($hotelReservation)
    {
        $hotelReservation= HotelReservation::find(intval($hotelReservation));
        return view("Admin.Reservation.HotelEdit",compact("hotelReservation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelReservation $hotelReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelReservation $hotelReservation)
    {
        //
    }
}
