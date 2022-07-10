<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\sanphamcontroller;
use App\Http\Controllers\loaisanphamcontroller;
use App\Http\Controllers\nhanviencontroller;
use App\Http\Controllers\khachhangcontroller;
use App\Http\Controllers\billbancontroller;
use App\Http\Controllers\api\apicartsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/sanphams', function () {
    return view('admin.sanpham');
});
Route::get('/admin/loaisps', function () {
    return view('admin.loaisp');
});
Route::get('/admin/nhanviens', function () {
    return view('admin.nhanvien');
});
Route::get('/admin/khachhangs', function () {
    return view('admin.khachhang');
});
Route::get('/admin/billbans', function () {
    return view('admin.hoadonban');
});
Route::get('/admin/billdbans', function () {
    return view('admin.cthoadonban');
});
Route::get('/admin/nhacungcaps', function () {
    return view('admin.nhacungcap');
});
Route::get('/admin/nguyenlieus', function () {
    return view('admin.nguyenlieu');
});
Route::get('/admin/billnhaps', function () {
    return view('admin.hoadonnhap');
});
Route::get('/clien/trangchus', function () {
    return view('clien.trangchu');
});
Route::get('/chitiet', function () {
    return view('clien.ctsp');
});
// Route::get('/giohang', function () {
//     return view('clien.cart');
// });
Route::get('/giohang', [apicartsController::class, 'showCart']);
Route::get('/loaisanpham', function () {
    return view('clien.sanpham');
});
Route::get('/login', function () {
    return view('clien.dangnhap');
});
Route::get('/dangky', function () {
    return view('clien.dangky');
});
Route::get('/about', function () {
    return view('clien.about');
});
Route::get('/blog', function () {
    return view('clien.blog');
});
Route::get('/giohangs', function () {
    return view('clien.cart');
});
Route::get('/thanhtoans', function () {
    return view('clien.checkout');
});
