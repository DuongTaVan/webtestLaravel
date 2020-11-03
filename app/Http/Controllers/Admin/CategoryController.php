<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCategory;
use App\Models\Category;
use App\Models\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        $trademarks = Trademark::all();
        return view('admin.category.create', compact('trademarks'));
    }
    public function store(AdminRequestCategory $request)
    {
        $data = $request->all();
        $data['c_slug'] = Str::slug($request->c_name);
        $category = Category::create($data);
        return redirect()->route('admin.category.index');
    }
    public function active($id){
        $category = Category::findOrFail($id);
        $category->c_status =! $category->c_status;
        $category->save();
        return redirect()->back();
    }
    public function hot($id){
        $category = Category::findOrFail($id);
        $category->c_hot =! $category->c_hot;
        $category->save();
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        $trademarks = Trademark::all();
        return view('admin.category.update', compact('category','trademarks'));
    }
    public function update(AdminRequestCategory $request,$id){
        $data = $request->all();
        $data['c_slug'] = Str::slug($request->c_name);
        $category =  Category::find($id);
        $category->update($data);
        return redirect()->route('admin.category.index')->with('thongbao','Sửa thành công!');
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
