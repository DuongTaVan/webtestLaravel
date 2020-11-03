<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cities = City::where('type', 0)->get();
        $carts = Cart::content();
        return view('frontend.pages.cart.index', compact('carts', 'cities'));
    }

    public function add($id)
    {
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->p_name, 'qty' => 1, 'price' => $product->p_price, 'weight' => 1, 'options' => ['image' => $product->p_image]]);
        //return redirect()->back();
        return response(['messages' => 'Thêm vào giỏ hàng thành công']);
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        $carts = Cart::content();
        $cities = City::where('type', 0)->get();
        $html = view('frontend.pages.cart.include.index', compact('carts', 'cities'))->render();
        return response(['html' => $html]);
    }

    public function delete(Request $request)
    {
        Cart::remove($request->rowId);
        $carts = Cart::content();
        $cities = City::where('type', 0)->get();
        $html = view('frontend.pages.cart.include.index', compact('carts', 'cities'))->render();
        return response(['html' => $html]);
    }
    public function ajax_location(Request $request){
        $parentID = $request->parentID;
        if($parentID)
        {
            $locations = City::where('parent_id',$parentID)->where('type',1)->get();
            //dd($locations);
            return response(['data'=>$locations]);
        }
    }
}
