<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestTrademark;
use App\Models\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrademarkController extends Controller
{
    public function index()
    {
        $trademarks = Trademark::paginate(10);

        return view('admin.trademark.index', compact('trademarks'));
    }

    public function create()
    {
        return view('admin.trademark.create');
    }

    public function store(AdminRequestTrademark $request)
    {
        $data = $request->all();
        $data['t_slug'] = Str::slug($request->t_name);
        $trademark = Trademark::create($data);
        return redirect()->route('admin.trademark.index');
    }

    public function active($id)
    {
        $trademark = Trademark::findOrFail($id);
        $trademark->t_status = !$trademark->t_status;
        $trademark->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $trademark = Trademark::findOrFail($id);
        $trademark->t_hot = !$trademark->t_hot;
        $trademark->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $trademark = Trademark::findOrFail($id);
        return view('admin.trademark.update', compact('trademark'));
    }

    public function update(AdminRequestTrademark $request, $id)
    {
        $data = $request->all();
        $data['t_slug'] = Str::slug($request->t_name);
        $trademark = Trademark::find($id);
        $trademark->update($data);
        return redirect()->route('admin.trademark.index')->with('thongbao', 'Sửa thành công!');
    }

    public function delete($id)
    {
        $trademark = Trademark::find($id);
        $trademark->delete();
        return redirect()->back();
    }
}
