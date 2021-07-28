<?php

namespace App\Http\Controllers;

use App\Models\billet;
use App\Models\pays;
use App\Models\ville;
use App\Models\photos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Image;
class BilletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.Billet.index");
    }
    public function datatables()
    {   
        return Datatables::of(billet::all())->editColumn('nom', function(billet $data) {
            return $data->ville->nom;
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
        return view("Admin.Billet.create",compact("pays"));
    }
    public function Billet(Request $request)
    {
        //$ville=ville::find($request->ville_to);
        $billet=billet::find($request->id);
        return view("Billet.show",compact("billet"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Billet();
        $input = $request->all();
        unset($input["_token"]);
        $data->fill($input)->save();

        if ($files = $request->file("photo")){
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('billet/'.$data->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',100);
            Storage::disk('public')->put( 'billet/'.$data->id."/".$name, $img);
            $data->photo='/storage/'.'billet/'.$data->id."/".$name;
            $data->update();
        }
        if ($files = $request->file("images")){
            foreach($files as $key => $file){
                $name=time().Str::random(8).'.'. $file->getClientOriginalExtension();
                $path=$file->storeAs('billet/'.$data->id, $name, 'public');
                photos::create(['type'=>3,'type_id'=>$data->id,"photo"=>'/storage/'.$path]);
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
        return view("Admin.Billet.edit",compact("pays","billet"));
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
}
