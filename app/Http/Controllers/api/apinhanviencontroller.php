<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nhanvien;
use \Datetime;
class apinhanviencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return nhanvien::all();
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
        $db = new nhanvien();
        $db->staff_name=$request->staff_name;
        $db->sex=$request->sex;
        $db->birthday=$request->birthday;
        $db->phone=$request->phone;
        $db->email=$request->email;
        $db->address=$request->address;
        $db->role=$request->role;
        $db->created_at=new Datetime();
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
        return nhanvien::findOrFail($id);
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
        $db=nhanvien::find($id);
        $db->staff_name=$request->staff_name;
        $db->sex=$request->sex;
        $db->birthday=$request->birthday;
        $db->phone=$request->phone;
        $db->email=$request->email;
        $db->address=$request->address;
        $db->role=$request->role;
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
        nhanvien::findOrFail($id)->delete();
        return "Deleted";
    }
}
