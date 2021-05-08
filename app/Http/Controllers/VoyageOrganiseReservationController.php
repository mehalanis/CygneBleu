<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\VoyageOrganiseReservation;
use App\Models\Client;
use Illuminate\Http\Request;
use DataTables;
class VoyageOrganiseReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.Reservation.VoyageOrganise");
    }
    public function datatables()
    {   
        $Client=Client::all();
        return Datatables::of($Client)->editColumn('nom', function(Client $data) {
            return $data->nom." ".$data->prenom;
        })
        ->addColumn('Pays', function(Client $data) {
            return $data->VoyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->ville->pays->nom;
        })
        ->addColumn('Ville', function(Client $data) {
            return $data->VoyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->ville->nom;
         })->addColumn('action', function(Client $data) {
            $btnView='<a href="'.route("VoyageOrganiseReservation.edit",['VoyageOrganiseReservation'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
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
        $input = $request->all();
        $voyage_organise_date_id=$input["voyage_organise_date_id"];
        $nb_Adulte=$input["nb_Adulte"];
        $nb_Adolescente=$input["nb_Adolescente"];
        $nb_Enfant=$input["nb_Enfant"];
        
        unset($input["nb_Adulte"]);
        unset($input["nb_Adolescente"]);
        unset($input["nb_Enfant"]);
        unset($input["voyage_organise_date_id"]);
        unset($input["_token"]);

        $Client =new Client();
        $Client->fill($input)->save();

        $VoyageOrganiseReservation=new VoyageOrganiseReservation();
        $VoyageOrganiseReservation->fill(array(
            'voyage_organise_date_id'=>$voyage_organise_date_id,
            "client_id"=>$Client->id,
            "nb_Adulte"=>$nb_Adulte,
            "nb_Adolescente"=>$nb_Adolescente,
            "nb_Enfant"=>$nb_Enfant,
        ))->save();
        Session::flash("Etat","Felicitation ! ");
        Session::flash("Message","votre réservation a été effectuée avec succès");
        return  view("Message");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoyageOrganiseReservation  $voyageOrganiseReservation
     * @return \Illuminate\Http\Response
     */
    public function show(VoyageOrganiseReservation $voyageOrganiseReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoyageOrganiseReservation  $voyageOrganiseReservation
     * @return \Illuminate\Http\Response
     */
    public function edit($voyageOrganiseReservation)
    {
        $voyageOrganiseReservation=VoyageOrganiseReservation::find($voyageOrganiseReservation);
        return view("Admin.Reservation.Edit",compact("voyageOrganiseReservation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoyageOrganiseReservation  $voyageOrganiseReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoyageOrganiseReservation $voyageOrganiseReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoyageOrganiseReservation  $voyageOrganiseReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoyageOrganiseReservation $voyageOrganiseReservation)
    {
        //
    }
}
