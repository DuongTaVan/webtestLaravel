<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }
    public function create(){
        return view('admin.coupon.create');
    }
    public function store(Request $request){
        $coupon = Coupon::create($request->all());
        return redirect()->route('admin.coupon.index');
    }
    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.update', compact('coupon'));
    }
    public function update(Request $request, $id){
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());
        return redirect()->route('admin.coupon.index');
    }
    public function active($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->cp_status =! $coupon->cp_status;
        $coupon->save();
        return redirect()->back();
    }
    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->back();
    }
}
