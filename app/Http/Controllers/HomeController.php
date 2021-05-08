<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoyageOrganise;

class HomeController extends Controller
{
    public function index()
    {
        $VoyageOrganise=VoyageOrganise::all();
        return view("index",compact("VoyageOrganise"));
    }
    public function Contact(){
        return view("Contact");
    }
}
