<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoyageOrganise;
use App\Models\Hotel;
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
        
        return view("index",compact("VoyageOrganise","Hotel","pays","billet"));
    }
    public function Contact(){
        return view("Contact");
    }
}
