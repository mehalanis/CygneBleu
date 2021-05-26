<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoyageOrganise;
use App\Models\Hotel;
class HomeController extends Controller
{
    public function index()
    {
        $VoyageOrganise=VoyageOrganise::all();
        $Hotel=Hotel::all();
        return view("index",compact("VoyageOrganise","Hotel"));
    }
    public function Contact(){
        return view("Contact");
    }
}
