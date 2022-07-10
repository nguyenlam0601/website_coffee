<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\api\apiloaisanphamcontroller;
use App\Http\Controllers\api\apisanphamcontroller;
use App\Http\Controllers\api\apinhanviencontroller;
use App\Http\Controllers\api\apikhachhangcontroller;
use App\Http\Controllers\api\apihoadonbancontroller;
use App\Http\Controllers\api\apicthoadonbancontroller;
use App\Http\Controllers\api\apicthoadonnhapcontroller;
use App\Http\Controllers\api\apihoadonnhapcontroller;
use App\Http\Controllers\api\apinguyenlieucontroller;
use App\Http\Controllers\api\apinhacungcapcontroller;
use App\Http\Controllers\api\apicartscontroller;
use App\Http\Controllers\api\apiusercontroller;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getsp/{id}', [apisanphamcontroller::class, 'getsp']);
Route::resource('products', apisanphamcontroller::class);
Route::resource('lsps', apiloaisanphamcontroller::class);
Route::resource('nhanviens', apinhanviencontroller::class);
Route::resource('khachhangs', apikhachhangcontroller::class);
Route::resource('billbans', apihoadonbancontroller::class);
Route::resource('billdbs', apicthoadonbancontroller::class);
Route::resource('ctbillnhaps', apicthoadonnhapcontroller::class);
Route::resource('billnhaps', apihoadonnhapcontroller::class);
Route::resource('nguyenlieus', apinguyenlieucontroller::class);
Route::resource('nhacungcaps', apinhacungcapcontroller::class);
Route::resource('carts', apicartscontroller::class);
// -----
Route::get('sanpham3/get', [apisanphamcontroller::class, 'index2']);
Route::get('sanpham2/get/{id}', [apisanphamcontroller::class, 'index3']);
Route::get('sanpham1/get/{id}', [apisanphamcontroller::class, 'show2'])->name('id');
// Route::resource('giohangs', apicartscontroller::class);
Route::get('sanpham4/get/{id}', [apisanphamcontroller::class, 'index4']);
Route::get('add-to-cart/{id}', [apicartscontroller::class, 'addToCart']);
route::resource("kh",apikhachhangcontroller::class);
route::get("kh1/get/{tk}&{mk}",[apikhachhangcontroller::class,"show2"]);
route::get("kh1/get/{tk}",[apikhachhangcontroller::class,"show3"]);
Route::get('carts/get/{id}',[apicartscontroller::class,'index1']);
Route::post('/themdonhang',[apihoadonbancontroller::class,'themdonhang']);
Route::get('/bill_detail/{id}',[apihoadonbancontroller::class,'bill_detail']);