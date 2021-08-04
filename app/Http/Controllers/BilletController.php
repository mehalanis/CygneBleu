<?php

namespace App\Http\Controllers;

use App\Models\billet;
use App\Models\pays;
use App\Models\ville;
use App\Models\BilletDate;
use App\Models\photos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Image;
use Carbon\Carbon;
class BilletController extends Controller
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
        return view("Admin.Billet.index");
    }
    public function datatables()
    {
        return Datatables::of(billet::all())->addColumn('villeDepart', function(billet $data) {
            return $data->villeDepartId->nom;
        })->addColumn('villeArrivee', function(billet $data) {
            return $data->villeArriveeId->nom;
        })->addColumn('action', function(billet $data) {
            $btnView='<a href="'.route("Billet.edit",['Billet'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
            return "<div class='action-list'>".$btnView."</div>";

        })->rawColumns(['action'])->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pays=pays::all();
        $age=$this->Age;
        $class=$this->Class;
        return view("Admin.Billet.create",compact("pays","age","class"));
    }
    public function Billet(Request $request)
    {
        //$ville=ville::find($request->ville_to);
        if($request->id=="-1"){
            $billet=billet::where("ville_depart_id",$request->ville_from)->where("ville_arrivee_id",$request->ville_to)->get()->first();
            return redirect()->route("BilletController.Billet",["id"=>$billet->id]);
        }else{
            $billet=billet::find($request->id);
        }
        $age=$this->Age;
        $class=$this->Class;
        return view("Billet.show",compact("billet","age","class"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Billet= Billet::create([
            "ville_depart_id" =>$request->ville_depart_id,
            "ville_arrivee_id" =>$request->ville_arrivee_id,
            "type"=>$request->type_billet,
            "state"=>$request->state
        ]);
        foreach($request->input("depart") as $key => $depart){
            BilletDate::create([
                "billet_id"=>$Billet->id,
                "depart"=>Carbon::createFromFormat('d/m/Y H:i', $request->input("depart")[$key])->format("Y-m-d H:i:00"),
                "retour"=>Carbon::createFromFormat('d/m/Y H:i', $request->input("retour")[$key] ?? "29/05/1999 23:05")->format("Y-m-d H:i:00"),
                "type"=>$request->input("type")[$key],
                "class"=>$request->input("class")[$key],
                "prix"=>$request->input("prix")[$key]
            ]);
        }

        if ($files = $request->file("photo")){
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('billet/'.$Billet->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',100);
            Storage::disk('public')->put( 'billet/'.$Billet->id."/".$name, $img);
            $Billet->photo='/storage/'.'billet/'.$Billet->id."/".$name;
            $Billet->update();
        }
        if ($files = $request->file("images")){
            foreach($files as $key => $file){
                $name=time().Str::random(8).'.'. $file->getClientOriginalExtension();
                $path=$file->storeAs('billet/'.$Billet->id, $name, 'public');
                photos::create(['type'=>3,'type_id'=>$Billet->id,"photo"=>'/storage/'.$path]);
            }
        }

        return redirect()->route("Billet.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function show(billet $billet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function edit( $billet)
    {
        $billet=billet::find($billet);
        $pays=pays::all();
        $age=$this->Age;
        $class=$this->Class;
        return view("Admin.Billet.edit",compact("pays","billet","age","class"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $billet)
    {
        $input = $request->all();
        $billet=billet::find(intval($billet));
        unset($input["_token"]);
        unset($input["photo"]);
        unset($input["prix"]);
        $billet->update($input);
        if ($files = $request->file("photo")){
            $URI_Image=explode('/', $billet->photo, 3);
            Storage::disk('public')->delete( $URI_Image);
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('billet/'.$billet->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',100);
            Storage::disk('public')->put( 'billet/'.$billet->id."/".$name, $img);
            $billet->photo='/storage/'.'billet/'.$billet->id."/".$name;
            $billet->update();
        }
        if(!$request->preloaded) $request->preloaded=array();
        $photo_list_id=$billet->getAllphotos()->pluck("id")->toArray();
        $photo_list_id_diff= array_diff($photo_list_id,$request->preloaded);
        foreach($photo_list_id_diff as $key => $val){
            $photo =photos::find($val);
            $URI_Image=explode('/', $photo->photo, 3);
            Storage::disk('public')->delete( $URI_Image);
            $photo->delete();
        }
        if ($files = $request->file("images")){
            foreach($files as $key => $file){
                $name=time().Str::random(8).'.'. $file->getClientOriginalExtension();
                $path=$file->storeAs('billet/'.$billet->id, $name, 'public');
                photos::create(['type'=>3,'type_id'=>$billet->id,"photo"=>'/storage/'.$path]);
            }
        }
        return redirect()->route("Billet.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function destroy(billet $billet)
    {
        //
    }
    public function GetDateBilletJson(Request $request){
        $BilletDate=BilletDate::selectRaw("id,depart,retour,prix")->where("class","=",$request->class)->where("type",$request->type)->where("billet_id",$request->billet_id);
        if($request->billet_type=="1"){
            $BilletDate=$BilletDate->whereNull("retour");
        }
        return $BilletDate->get();
    }
}
