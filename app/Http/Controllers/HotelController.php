<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\pays;
use App\Models\photos;
use App\Models\Option;
use App\Models\HotelOption;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DataTables;
use Image;
class HotelController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.Hotel.index"); 
    }
    public function datatables()
    {   
        $Hotel=Hotel::all();
        return Datatables::of($Hotel)->addColumn('Pays', function(Hotel $data) {
                                return $data->ville->pays->nom;
                            })
                            ->addColumn('Ville', function(Hotel $data) {
                                return $data->ville->nom;
                            })
                            ->addColumn('action', function(Hotel $data) {
                                $btnView='<a href="'.route("Hotel.edit",['Hotel'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
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
        $pays=pays::all();
        $option=Option::all();
        return view("Admin.Hotel.create",compact("pays","option"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =new Hotel();
        $input = $request->all();
        unset($input["_token"]);
        $data->fill($input)->save();
        foreach($request->input("equipements") as $key => $val){
            HotelOption::create(["hotel_id"=>$data->id,"option_id"=>$val]);
        }
        if ($files = $request->file("photo")){
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('Hotel/'.$data->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',80);
            Storage::disk('public')->put( 'Hotel/'.$data->id."/".$name, $img);
            $data->photo='/storage/'.'Hotel/'.$data->id."/".$name;
            $data->update();
        }
        if ($files = $request->file("images")){
            foreach($files as $key => $file){
                $name=time().Str::random(8).'.'. $file->getClientOriginalExtension();
                $path=$file->storeAs('Hotel/'.$data->id, $name, 'public');
                photos::create(['type'=>2,'type_id'=>$data->id,"photo"=>'/storage/'.$path]);
            }
        }
        return redirect()->route("Hotel.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $pays
     * @return \Illuminate\Http\Response
     */
    public function show($hotel)
    {
        $hotel=Hotel::findorFail(intval($hotel));
        return view("Hotel.Show",compact("hotel")); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $pays
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel)
    {
        $hotel=Hotel::find(intval($hotel));
        $pays=pays::all();
        $option=Option::all();
        return view("Admin.Hotel.edit",compact("hotel","pays","option"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $pays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$hotel)
    {
        $hotel=Hotel::find(intval($hotel));
        $input = $request->all();
        unset($input["_token"]);
        unset($input["photo"]);
        $hotel->update($input);

        $list_option=$hotel->Options()->select("hotel_option.option_id as id")->pluck("id")->toArray();
        
        $photo_list_id_diff= array_diff($request->input("equipements"),$list_option);
        foreach($photo_list_id_diff as $key => $val){
            HotelOption::create(["hotel_id"=>$hotel->id,"option_id"=>$val]);
        }

        if(!$request->equipements) $request->equipements=array();
        $photo_list_id_diff= array_diff($list_option,$request->equipements);
        foreach($photo_list_id_diff as $key => $val){
            HotelOption::where('hotel_id',$hotel->id)->where("option_id",$val)->delete();
        }
        
        if ($files = $request->file("photo")){
            $URI_Image=explode('/', $hotel->photo, 3);
            Storage::disk('public')->delete( $URI_Image);
            $name="photo".time().Str::random(8).'.'. $files->getClientOriginalExtension();
            $path=$files->storeAs('Hotel/'.$hotel->id, $name, 'public');
            $img = Image::make($files)->resize(350, 240)->encode('jpg',80);
            Storage::disk('public')->put( 'Hotel/'.$hotel->id."/".$name, $img);
            $hotel->photo='/storage/'.'Hotel/'.$hotel->id."/".$name;
            $hotel->update();
        }
        if(!$request->preloaded) $request->preloaded=array();
        $photo_list_id=$hotel->getAllphotos()->pluck("id")->toArray();
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
                $path=$file->storeAs('Hotel/'.$hotel->id, $name, 'public');
                photos::create(['type'=>2,'type_id'=>$hotel->id,"photo"=>'/storage/'.$path]);
            }
        }
        return redirect()->route("Hotel.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $Hotel)
    {
        //
    }
    public  function Hotel()
    {
        $pays=pays::all();
        return view("Hotel.Hotel",compact("pays"));
    }
    public function GetHotel()
    {
        $Hotel=Hotel::select("hotels.*")->Join("villes","hotels.ville_id","=","villes.id");
        if(isset($_GET["pays"])&&($_GET["pays"]!="0")) $Hotel=$Hotel->where("pays_id",$_GET["pays"]);
        if(isset($_GET["ville"])&&($_GET["ville"]!="0")) $Hotel=$Hotel->where("hotels.ville_id",$_GET["ville"]);
        $Hotel=$Hotel->whereBetween("prix",[$_GET["from"],$_GET["to"]])->paginate(1);
    	$view = view('include.HotelTemplate',compact('Hotel'))->render();
        return response()->json(['html'=>$view]);
    }
}
