<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nguyenlieu;
use \Datetime;
class apinguyenlieucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return nguyenlieu::with('nhacungcap')->get();
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
        $db = new nguyenlieu();
        $db->materials_name=$request->materials_name;
        $db->id_supplier=$request->id_supplier;
        $db->image=$request->image;
        $db->price=$request->price;
        $db->materials_unit=$request->materials_unit;
        $db->note=$request->note;
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
        return nguyenlieu::findOrFail($id);
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
        $db=nguyenlieu::find($id);
        $db->materials_name=$request->materials_name;
        $db->id_supplier=$request->id_supplier;
        $db->image=$request->image;
        $db->price=$request->price;
        $db->materials_unit=$request->materials_unit;
        $db->note=$request->note;
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
        nguyenlieu::findOrFail($id)->delete();
        return "Deleted";
    }
}
