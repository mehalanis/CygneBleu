<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GeneralSetting=GeneralSetting::find(1);
        if(!$GeneralSetting){
            $GeneralSetting=GeneralSetting::create(
                ["Telephone_1"=>"0550 053 574",
                "Telephone_2"=>"0550 053 514",
                "Fix"=>"023 834 265",
                "Email"=>"cygnebleu.bahri@gmail.com",
                "Adresse"=>"coopérative familiale n°95 brise marine, Bordj El Bahri 16046 Bordj El Bahri, Algérie",
                "facebook"=>"https://www.facebook.com/cygnebleuavt"]
            );
        }
        return view("Admin.GeneralSettings",compact("GeneralSetting"));
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
        $data = GeneralSetting::findOrFail(1);
        $input = $request->all();
        $data->update($input);
        return redirect()->route("GeneralSetting.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
