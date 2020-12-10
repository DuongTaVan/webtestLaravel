<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('pages.home.index');
    }

    public function post_login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('pages.home.index');
        }
        else
            return redirect()->back();
    }
}
