<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoyageOrganise;
use App\Models\Hotel;
use App\Models\ville;
use App\Models\pays;
use App\Models\billet;
class HomeController extends Controller
{
    public function index()
    {
        $VoyageOrganise=VoyageOrganise::all();
        $Hotel=Hotel::all();
        $pays=pays::all();
        $billet = billet::all();
        $ville_depart_avion=billet::select("ville_depart_id")->distinct()->get()->pluck("ville_depart_id")->toArray();
        $ville_depart_avion=ville::whereIn("id",$ville_depart_avion)->get();
        return view("index",compact("VoyageOrganise","Hotel","pays","billet","ville_depart_avion"));
    }
    public function GetVilleArriveeJson(Request $request){
        $ville_arrivee_avion=billet::select("ville_arrivee_id")->distinct()->where("ville_depart_id",$request->ville_depart_id)->get()->pluck("ville_arrivee_id")->toArray();
        $ville_arrivee_avion=ville::whereIn("id",$ville_arrivee_avion)->get();
        $list=array();
        foreach($ville_arrivee_avion as $ville){
            $ville['id']=$ville->id;
            $ville["nom"]=$ville->nom." - ".$ville->pays->nom;
            $list[]=$ville;
        }
        return response()->json($list);
    }
    public function Contact(){
        return view("Contact");
    }
}
