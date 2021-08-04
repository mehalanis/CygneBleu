<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\VoyageOrganiseReservation;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return view("Admin.Reservation.VoyageOrganise");
    }
    public function datatables()
    {   
        $Client=Client::select("clients.*","voyage_organise_reservations.id as voyage_organise_reservations_id")->join("voyage_organise_reservations","clients.id","=","voyage_organise_reservations.client_id")->get();
        return Datatables::of($Client)->editColumn('nom', function(Client $data) {
            return $data->nom." ".$data->prenom;
        })
        ->addColumn('Pays', function(Client $data) {
            return $data->VoyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->ville->pays->nom;
        })
        ->addColumn('Ville', function(Client $data) {
            return $data->VoyageOrganiseReservation->VoyageOrganiseDate->VoyageOrganise->ville->nom;
         })->addColumn('action', function(Client $data) {
            $btnView='<a href="'.route("VoyageOrganiseReservation.edit",['VoyageOrganiseReservation'=>$data->voyage_organise_reservations_id]).'" class="btn btn-block btn-primary">View</button>';
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
        $paiement_type=$input["paiement_type"];
        $path="";
        if(($paiement_type=="1")||($paiement_type=="2")){
            if($request->hasFile("paiment_photo")){
                $name=time().Str::random(8).'.'. $request->file("paiment_photo")->getClientOriginalExtension();
                $path=$request->file("paiment_photo")->storeAs('VoyageOrganiseReservation', $name, 'public');
                $path='/storage/'.$path;
            }
        }
        unset($input["nb_Adulte"]);
        unset($input["nb_Adolescente"]);
        unset($input["nb_Enfant"]);
        unset($input["voyage_organise_date_id"]);
        unset($input["paiement_type"]);
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
            "paiement_type"=>$paiement_type,
            "paiment_photo"=>$path
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
        $voyageOrganiseReservation=VoyageOrganiseReservation::find(intval($voyageOrganiseReservation));
        return view("Admin.Reservation.VoyageOrganiseEdit",compact("voyageOrganiseReservation"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoyageOrganiseReservation  $voyageOrganiseReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $voyageOrganiseReservation)
    {
        $voyageOrganiseReservation = VoyageOrganiseReservation::findOrFail($voyageOrganiseReservation);
        $input = $request->all();
        $voyageOrganiseReservation->update($input);
        return redirect()->back();
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
