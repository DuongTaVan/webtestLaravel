<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('frontend.pages.account.login.index');
    }
    public function register(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['provider'] = '';
        $data['provider_id'] = '';
        $user = User::create($data);
        return redirect()->back();
    }
}
