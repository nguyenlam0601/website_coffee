<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use \Datetime;
class apiusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return user::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db=new user();
        $db->user_name=$request->tk;
        $db->password=$request->mk;
        $db->full_name=$request->ten;
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return user::findOrFail($id);
    }
    public function show2($tk,$mk)
    {
        $db=user::where("user_name","=","$tk")->where("password","=","$mk")->get();
        return $db[0];
    }
    public function show3($tk)
    {
        $db=user::where("user_name","=","$tk")->get();
        return $db[0];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $db=new user();
        // $db->user_name=$request->tk;
        // $db->password=$request->mk;
        // $db->full_name=$request->ten;
        // // $db->updated=new Datetime();
        // $db->save();
        // return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        khachhang::findOrFail($id)->delete();
        return "Deleted";
    }
}
