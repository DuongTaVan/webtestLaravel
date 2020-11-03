<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'trademart')->paginate(10);
        //dd($products);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $trademarks = Trademark::all();
        $categories = Category::all();
        return view('admin.product.create', compact('trademarks', 'categories'));
    }

    public function store(AdminRequestProduct $request)
    {
        $data = $request->all();
        $data['p_slug'] = Str::slug($request->p_name);
        if ($request->hasfile('p_image')) {
            $file = $request->file('p_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
        }
        $data['p_image'] = 'uploads/products/' . $filename;
        $product = Product::create($data);
        return redirect()->route('admin.product.index');
    }

    public function active($id)
    {
        $product = Product::findOrFail($id);
        $product->p_status = !$product->p_status;
        $product->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $product = Product::findOrFail($id);
        $product->p_hot = !$product->p_hot;
        $product->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $trademarks = Trademark::all();
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('trademarks', 'categories', 'product'));
    }

    public function update(AdminRequestProduct $request, $id)
    {
        $data = $request->all();
        $data['c_slug'] = Str::slug($request->p_name);
        $product = Product::findOrFail($id);
        if ($request->hasFile('p_image')) {
            if ($product->p_image) {
                $old_image = $product->p_image;
                unlink($old_image);
            }
            $file = $request->file('p_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
        }
        $data['p_image'] = 'uploads/products/' . $filename;
        $product->update($data);
        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function ajax_product(Request $request)
    {
        $id = $request->id_trademark;
        $categories = Category::where('t_id', $id)->get();
        foreach ($categories as $category) {
            echo "<option value='" . $category->id . "'>" . $category->c_name . "</option>";
        }
        //return response(['messages'=>'Đánh giá thành công', 'output=>$output']);
    }

    public function ajax_coupon(Request $request)
    {
        //Session::forget('coupon');
        $code = $request->code;
        $check = Coupon::where('cp_code', $code)->where('cp_status',1)->first();
        if ($check) {
            $coupon_session = Session::get('coupon');
            if ($coupon_session) {
                //Session::forget('coupon');
                $a[] = array(
                    'cp_name' => $check->cp_name,
                    'cp_code' => $check->cp_code,
                    'cp_type' => $check->cp_type,
                    'cp_status' => $check->cp_status,
                    'cp_number' => $check->cp_number,
                );
            } else {
                $a[] = array(
                    'cp_name' => $check->cp_name,
                    'cp_code' => $check->cp_code,
                    'cp_type' => $check->cp_type,
                    'cp_status' => $check->cp_status,
                    'cp_number' => $check->cp_number,
                );

            }
            Session::put('coupon', $a);
            Session::save();
        }
        $carts = Cart::content();
        $cities = City::where('type', 0)->get();
        $html = view('frontend.pages.cart.include.index', compact('carts', 'cities'))->render();
        return response(['html' => $html]);
    }
    public function delete_ajax_coupon(){
        Session::forget('coupon');
        $carts = Cart::content();
        $cities = City::where('type', 0)->get();
        $html = view('frontend.pages.cart.include.index', compact('carts', 'cities'))->render();
        return response(['html' => $html]);
    }
}
