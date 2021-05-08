<?php

namespace App\Http\Controllers;

use App\Models\VoyageOrganise;
use App\Models\VoyageOrganiseDate;
use Illuminate\Http\Request;
use App\Models\pays;
use App\Models\ville;
use App\Models\photos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DataTables;
use Image;
class VoyageOrganiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("Admin.VoyageOrganise.index");
    }
    public function datatables()
    {   
        $VoyageOrganise=VoyageOrganise::all();
        return Datatables::of($VoyageOrganise)->addColumn('Pays', function(VoyageOrganise $data) {
                                return $data->ville->pays->nom;
                            })
                            ->addColumn('Ville', function(VoyageOrganise $data) {
                                return $data->ville->nom;
                            })
                            ->addColumn('action', function(VoyageOrganise $data) {
                                $btnView='<a href="'.route("VoyageOrganise.edit",['VoyageOrganise'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
                                return "<div class='action-list'>".$btnView."</div>";
                                
                            })->rawColumns(['action'])->toJson(); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //pays::create(["nom"=>"Algérie"]);  ville::create(["pays_id"=>1,"nom"=>"Adrar"]);  pays::create(["nom"=>"France"]);  ville::create(["pays_id"=>2,"nom"=>"Paris"]);
        $pays=pays::all();
        return view("Admin.VoyageOrganise.create",compact("pays"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  
    public function store(Request $request)
    {
        $data =new VoyageOrganise();
        $input = $request->all();
        unset($input["_token"]);
        $data->fill($input)->save();
        foreach($request->depart as $key => $depart){
            VoyageOrganiseDate::create([
                "voyage_organise_id"=>$data->id,
                "depart"=>$depart,
                "retour"=>$request->retour[$key],
                "max_personne"=>$request->max_personne[$key]
            ]);
        }
        if ($files = $request->file("photo")){
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('VoyageOrganise/'.$data->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',80);
            Storage::disk('public')->put( 'VoyageOrganise/'.$voyageOrganise->id."/".$name, $img);
            $data->photo='/storage/'.'VoyageOrganise/'.$voyageOrganise->id."/".$name;
            $data->update();
        }
        if ($files = $request->file("images")){
            foreach($files as $key => $file){
                $name=time().Str::random(8).'.'. $file->getClientOriginalExtension();
                $path=$file->storeAs('VoyageOrganise/'.$data->id, $name, 'public');
                photos::create(['type'=>1,'type_id'=>$data->id,"photo"=>'/storage/'.$path]);
            }
        }
        return redirect()->route("VoyageOrganise.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function show(VoyageOrganise $voyageOrganise)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function edit($voyageOrganise)
    {
        $voyageOrganise=VoyageOrganise::find($voyageOrganise);
        $pays=pays::all();
        return view("Admin.VoyageOrganise.edit",compact("voyageOrganise","pays"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $voyageOrganise)
    {
        $voyageOrganise=VoyageOrganise::find($voyageOrganise);
        $input = $request->all();
        unset($input["_token"]);
        unset($input["photo"]);
        $voyageOrganise->update($input);
        $VoyageOrganiseDate_list_id=$voyageOrganise->VoyageOrganiseDate()->pluck("id")->toArray();
        foreach($request->depart as $key => $depart){
            if($request->VoyageOrganiseDate_id[$key]=="-1"){
                VoyageOrganiseDate::create([
                    "voyage_organise_id"=>$voyageOrganise->id,
                    "depart"=>$depart,
                    "retour"=>$request->retour[$key],
                    "max_personne"=>$request->max_personne[$key]
                ]);
            }else{
                $VoyageOrganiseDate=VoyageOrganiseDate::find(intval($request->VoyageOrganiseDate_id[$key]));
                $VoyageOrganiseDate->update( array(
                    "depart"=>$depart,
                    "retour"=>$request->retour[$key],
                    "max_personne"=>$request->max_personne[$key]
                ));
            }
        }
        $VoyageOrganiseDate_list_diff= array_diff($VoyageOrganiseDate_list_id,$request->VoyageOrganiseDate_id);
        foreach($VoyageOrganiseDate_list_diff as $key=> $id){
            $VoyageOrganiseDate=VoyageOrganiseDate::find($id);
            $VoyageOrganiseDate->delete();
        }
        if ($files = $request->file("photo")){
            $URI_Image=explode('/', $voyageOrganise->photo, 3);
            Storage::disk('public')->delete( $URI_Image);
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $img = Image::make($files)->resize(350, 240)->encode('jpg',80);
            Storage::disk('public')->put( 'VoyageOrganise/'.$voyageOrganise->id."/".$name, $img);
            $voyageOrganise->photo='/storage/'.'VoyageOrganise/'.$voyageOrganise->id."/".$name;
            $voyageOrganise->update();
        }
        if(!$request->preloaded) $request->preloaded=array();
        $photo_list_id=$voyageOrganise->getAllphotos()->pluck("id")->toArray();
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
                $path=$file->storeAs('VoyageOrganise/'.$voyageOrganise->id, $name, 'public');
                photos::create(['type'=>1,'type_id'=>$voyageOrganise->id,"photo"=>'/storage/'.$path]);
            }
        }
        return redirect()->route("VoyageOrganise.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoyageOrganise  $voyageOrganise
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoyageOrganise $voyageOrganise)
    {
        //
    }
    /* 
        FrontEnd
    */
    public function ShowDetail(VoyageOrganise $voyageOrganise)
    {
        return view("VoyageOrganise.showDetail",compact("voyageOrganise"));
    }
    public function VoyageOrganise()
    {
        $pays=pays::all();
        return view("VoyageOrganise.VoyageOrganise",compact("pays"));
    }
    public function GetVoyageOrganise()
    {
        $VoyageOrganise=VoyageOrganise::select("voyage_organises.*")->Join("villes","voyage_organises.ville_id","=","villes.id");
        if(isset($_GET["pays"])&&($_GET["pays"]!="0")) $VoyageOrganise=$VoyageOrganise->where("pays_id",$_GET["pays"]);
        if(isset($_GET["ville"])&&($_GET["ville"]!="0")) $VoyageOrganise=$VoyageOrganise->where("voyage_organises.ville_id",$_GET["ville"]);
        $VoyageOrganise=$VoyageOrganise->whereBetween("prixAdulte",[$_GET["from"],$_GET["to"]])->paginate(1);
    	$view = view('include.VoyageOrganiseTemplate',compact('VoyageOrganise'))->render();
        return response()->json(['html'=>$view]);
    }

}
