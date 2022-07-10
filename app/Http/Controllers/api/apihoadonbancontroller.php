<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hoadonban;
use App\Models\cthoadonban;
use \Datetime;
class apihoadonbancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return hoadonban::with('khachhang')->get();
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
        $db = new hoadonban();
        $db->id_customer=$request->id_customer;
        $db->date_order=$request->date_order;
        $db->total=$request->total;
        $db->payment=$request->payment;
        $db->delivery_address=$request->delivery_address;
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
        return hoadonban::findOrFail($id);
    }
    public function bill_detail($id)
    {
        return hoadonban::with(['cthd','cthd.sanpham'])->findOrFail($id);
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
    public function themdonhang(Request $request)
    {
        $db = new hoadonban();
        // $db->MaDH=$request->MaDH;

        // $db->NgayDatHang=date('Y-m-d H:i:s', strtotime($request->NgayDatHang));
        $db->total=$request->total;
        $db->delivery_address=$request->delivery_address;
        $db->id_customer=$request->id_customer;
        $db->save();
        foreach($request->bill_detail as $s){
            $ct = new cthoadonban();
            $ct->id_product = $s['id_product'];
            $ct->amount = $s['amount'];
            $ct->id_bill =  $db->id;
            $ct->image = $s['image'];
            $ct->price = $s['price'];
            $ct->save();
        }
        return $db;
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
        $db=hoadonban::find($id);
        $db->id_customer=$request->id_customer;
        $db->date_order=$request->date_order;
        $db->total=$request->total;
        $db->payment=$request->payment;
        $db->delivery_address=$request->delivery_address;
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
        hoadonban::findOrFail($id)->delete();
        return "Deleted";
    }
}
