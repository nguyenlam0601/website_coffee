<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\sanpham;
// use App\Models\carts;
use Illuminate\Http\Request;
use Monolog\Handler\RedisPubSubHandler;
use App\Models\carts;

class apicartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    public function addToCart($id){
        
        // session()->flush();
        $product = sanpham::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['qty'] = $cart[$id]['qty'] + 1;
            // echo "<script>alert('Thêm sản phẩm thành công')</script>";
            session()->put('cart', $cart);

            return $cart;

        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'qty' => 1,
                'image' => $product->image   
            ];
            // echo "<script>alert('Thêm sản phẩm thành công')</script>";
            session()->put('cart', $cart);

            return $cart;

        }
        
        // return "a";
        // return back();
        // echo "<pre>";
        // print_r(session()->get('cart'));
    }

    public function showCart() {
        $carts = session()->get('cart');
        return view('clien.cart', compact('carts'));
        // return $carts;
    }

    public function deleteFromCart($id) {
        $cart = session()->get('cart');
        foreach ($cart as $index => $product) {
            if ($product['id'] == $id) {
               unset($cart[$index]);
            }
        }
        session(['cart' => $cart]);
    }
    public function index1($makh){
        return carts::with('sp','size_p')->where ('id_customer','=',$makh)->get();
    }
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
        $db=carts::where('id_customer','=',$request->id)->get();
        if($db!=[]){
            $sp=carts::where('id_customer','=',$request->id)->where('id_product','=',$request->id_product)->get();
            if($sp==[]){
                $dbdb=new carts();
                $dbdb->id_customer=$request->id;
                $dbdb->id_product=$request->id_product;
                $dbdb->id_size=$request->id_size;
                $dbdb->amount=$request->sl;
                $dbdb->save();
                return $dbdb;
                // return "alo4";
            }else{
                $mausp=carts::where('id_customer','=',$request->id)->where('id_product','=',$request->id_product)->where('id_size','=',$request->id_size)->first();
                if($mausp==[]){
                    $dbdb=new carts();
                    $dbdb->id_customer=$request->id;
                    $dbdb->id_product=$request->id_product;
                    $dbdb->id_size=$request->id_size;
                    $dbdb->amount=$request->sl;
                    $dbdb->save();
                    return $dbdb;
                }
                else{
                    $dbdb=carts::find($mausp->id);
                    $dbdb->id_customer=$request->id;
                    $dbdb->id_product=$request->id_product;
                    $dbdb->id_size=$request->id_size;
                    $dbdb->amount=($request->sl)+($dbdb->amount);
                    $dbdb->save();
                    return $dbdb;
                    // return "alo2";
                }
            }
        }else{
            $dbdb=new carts();
            $dbdb->id_customer=$request->id;
            $dbdb->id_product=$request->id_product;
            $dbdb->id_size=$request->id_size;
            $dbdb->amount=$request->sl;
            $dbdb->save();
            return $dbdb;
            // return "alo1";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // return $db;
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       carts::findOrFail($id)->delete();
        return "Deleted";
    }
}
