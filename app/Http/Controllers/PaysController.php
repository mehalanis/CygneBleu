<?php

namespace App\Http\Controllers;

use App\Models\pays;
use App\Models\photos;
use App\Models\ville;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.Pays.index");
    }
    public function datatables()
    {
        return Datatables::of(pays::all())->addColumn('action', function(pays $data) {
            $btnView='<a href="'.route("Pays.edit",['Pay'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
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
        return  view("Admin.Pays.create");
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
        $pays= pays::create([
            "nom"=> $input["nom"]
        ]);
        foreach($request->input("Villes") as $key => $val){
            ville::create(["pays_id"=>$pays->id,"nom"=>$val]);
        }

        return redirect()->route("Pays.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function show(pays $pays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function edit( $pays)
    {
        $pays=pays::find($pays);
        return view("Admin.Pays.edit",compact("pays"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pays $pays)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function destroy(pays $pays)
    {
        //
    }
    public function GetVillesJSON(pays $pays)
    {
        return response()->json($pays->ville()->get());
    }
}
