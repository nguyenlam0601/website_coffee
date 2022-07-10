<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use \Datetime;
class apisanphamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return sanpham::with('loaisanpham')->get();
        //  $SANPHAMs = sanpham::get();
        // foreach($SANPHAMs as $cac ){
        //     $cac->loaisanpham;
        // }
        // return $SANPHAMs;
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
 public function index2()
{
    return sanpham::with('loaisanpham')->take(8)->get();
}
    public function index3($id)
    {
        $db=sanpham::find($id);
        return sanpham::where('id_category','=',$db->id_category)->where('id','<>',$db->id)->take(4)->get();
    }
    public function index4($id)
    {
        return sanpham::where('id_category','=',$id)->get();
    }
  
    
    public function show2($id){
        $db=sanpham::with('loaisanpham','size')->get();
        foreach ($db as $sp) {
            if($sp->id==$id){
                return $sp;
            }
        }
        return view('clien.trangchu');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new sanpham();
        $db->product_name = $request->product_name;
        $db->id_category = $request->id_category;
        $db->price=$request->price;
        $db->sale_price=0;
        $db->description = $request->description;
        // $db->product_unit = $request->product_unit;
        $db->image=$request->image;
        // $db->status = $request->status;
        $db->created_at = new Datetime();
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
        return sanpham::findOrFail($id);
    }

    public function getsp($id)
    {
        return sanpham::with('size')->findOrFail($id);
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
        $db = sanpham::find($id);
        $db->product_name = $request->product_name;
        $db->id_category = $request->id_category;
        $db->price=$request->price;
        // $db->sale_price=$request->sale_price;
        $db->description = $request->description;
        // $db->product_unit = $request->product_unit;
        $db->image=$request->image;
        // $db->status = $request->status;
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
        // ::with('loaisanpham')
        // ->where('id','=',$id)
        // ->get();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sanpham::findOrFail($id)->delete();
        return "Deleted";
    }
}