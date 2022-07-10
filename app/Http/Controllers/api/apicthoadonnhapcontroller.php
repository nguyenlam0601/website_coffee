<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cthoadonnhap;
use \Datetime;
class apicthoadonnhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return cthoadonnhap::all();
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
        $db = new cthoadonnhap();
        $db->import_bill_id=$request->import_bill_id;
        $db->id_materials=$request->id_materials;
        $db->amount=$request->amount;
        $db->unit=$request->unit;
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
        return cthoadonnhap::findOrFail($id);
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
        $db=cthoadonnhap::find($id);
        $db->import_bill_id=$request->import_bill_id;
        $db->id_materials=$request->id_materials;
        $db->amount=$request->amount;
        $db->unit=$request->unit;
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
        cthoadonnhap::findOrFail($id)->delete();
        return "Deleted";
    }
}
