<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khachhang;
use \Datetime;
class apikhachhangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return khachhang::all();
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
        $db = new khachhang();
        $db->customer_name=$request->customer_name;
        $db->user_name=$request->tk;
        $db->password=$request->mk;
        $db->phone=$request->phone;
        $db->email=$request->email;
        $db->address=$request->address;
        $db->created_at=new Datetime();
        $db->save();
        return $db;
    }
    public function show2($tk,$mk)
    {
        $db=khachhang::where("user_name","=","$tk")->where("password","=","$mk")->get();
        return $db[0];
    }
    public function show3($tk)
    {
        $db=khachhang::where("user_name","=","$tk")->get();
        return $db[0];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return khachhang::findOrFail($id);
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
        $db=khachhang::find($id);
        $db->customer_name=$request->customer_name;
        $db->phone=$request->phone;
        $db->email=$request->email;
        $db->address=$request->address;
        $db->updated=new Datetime();
        $db->save();
        return $db;
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
