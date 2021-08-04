<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.User.index");
    }
    public function datatables()
    {
        $User=User::select("id",'name',"email","droit")->get();

        return DataTables::of($User)->editColumn('droit', function(User $data) {
            switch($data->droit){
                case "0": return "Administrateur"; break;
                case "1": return "Vendeur"; break;
                case "2": return "Partenaire"; break;
            }
            return $data->droit;
        })->addColumn('action', function(User $data) {
            $btnView='<a href="'.route("User.edit",['User'=>$data->id]).'" class="btn btn-block btn-primary">View</button>';
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
        return view("Admin.User.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
            "droit"=>$request->droit,
            "state"=>$request->state,
            "budget"=>$request->budget
        ]);
        return redirect()->route("User.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view("Admin.User.edit",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $data=$request->all();
        if(!$data['password']){
            unset($data['password']);
        }
        unset($data['_token']);
        unset($data['_method']);
        $user->update($data);
        return redirect()->route("User.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
