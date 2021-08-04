<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\BilletReservation;
use Illuminate\Http\Request;
use App\Models\Client;
use DataTables;
class BilletReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $Age=[
        "0"=>"Seigneur (60+ ans )",
        "1"=>"Adultes (12+ ans)",
        "2"=>"Enfants (2 ans - Moins de 12 ans)",
        "3"=>"Bébés (Moins de 2 ans)"
    ];
    public $Class=[
        "0"=>"Economique",
        "1"=>"Affaires",
        "2"=>"Première",
    ];
    public function index()
    {
        return view("Admin.Reservation.Billet");
    }
    public function datatables()
    {
        $Client=Client::select("clients.*","billet_reservations.id as billet_reservations_id")->join("billet_reservations","clients.id","=","billet_reservations.client_id")->get();

        return Datatables::of($Client)->editColumn('nom', function(Client $data) {
            return $data->nom." ".$data->prenom;
        })
        ->addColumn('ville_depart', function(Client $data) {
            //dd($data->BilletReservation->billetDate->billet->villeDepartId->nom);
            return $data->BilletReservation->billetDate->billet->villeDepartId->nom;
        })
        ->addColumn('ville_arrivee', function(Client $data) {
            return $data->BilletReservation->billetDate->billet->villeArriveeId->nom;
         })->addColumn('action', function(Client $data) {
            $btnView='<a href="'.route("BilletReservation.edit",["BilletReservation"=>$data->BilletReservation->id]).'" class="btn btn-block btn-primary">View</button>';
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "telephone"=>$request->telephone,
            "is_whatsapp"=>$request->is_whatsapp ?? "-1",
            "is_viber"=>$request->is_viber  ?? "-1",
            "is_imo"=>$request->is_imo  ?? "-1",
            "email"=>$request->email ?? "",
            "message"=>$request->message
        ]);
        BilletReservation::create([
            "billet_date_id"=>$request->billet_date_id,
            "client_id"=>$client->id,
            "is_paid"=>"-1",
            "versements"=>"0",
            "reduction"=>"0"
        ]);
        Session::flash("Etat","Felicitation ! ");
        Session::flash("Message","votre réservation a été effectuée avec succès");
        return  view("Message");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BilletReservation  $billetReservation
     * @return \Illuminate\Http\Response
     */
    public function show(BilletReservation $billetReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BilletReservation  $billetReservation
     * @return \Illuminate\Http\Response
     */
    public function edit($billetReservation)
    {
        $billetReservation=BilletReservation::find($billetReservation);
        $age=$this->Age;
        $class=$this->Class;
        return view("Admin.Reservation.BilletEdit",compact("billetReservation","age","class"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BilletReservation  $billetReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BilletReservation $billetReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BilletReservation  $billetReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BilletReservation $billetReservation)
    {
        //
    }
}
