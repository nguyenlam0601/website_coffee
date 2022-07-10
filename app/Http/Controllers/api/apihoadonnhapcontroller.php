<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hoadonnhap;
use \Datetime;
class apihoadonnhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return hoadonnhap::with('nhacungcap','nhanvien')->get();
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
        $db = new hoadonnhap();
        $db->id_supplier=$request->id_supplier;
        $db->id_staff=$request->id_staff;
        $db->date_order=$request->date_order;
        $db->total=$request->total;
        $db->payment=$request->payment;
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
        return hoadonnhap::findOrFail($id);
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
        $db=hoadonnhap::find($id);
        $db->id_supplier=$request->id_supplier;
        $db->id_staff=$request->id_staff;
        $db->date_order=$request->date_order;
        $db->total=$request->total;
        $db->payment=$request->payment;
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
        hoadonnhap::findOrFail($id)->delete();
        return "Deleted";
    }
}
