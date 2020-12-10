<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use App\User;

class GoogleLoginController extends Controller
{
    public function redirect($provider)
    {
        //dd(1);
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        //Socialite::driver('google')->stateless()->user();
        //$getInfo = Socialite::driver($provider)->user();
        $getInfo = Socialite::driver($provider)->stateless()->user();
        // dd(1);
        $user = $this->createUser($getInfo, $provider);

        auth()->login($user);


        return redirect()->route('frontend.login.index');

    }

    function createUser($getInfo, $provider)
    {
        // dd(1);

        $user = User::where('provider_id', $getInfo->id)->first();

        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'password' => ''
            ]);
        }
        return $user;
    }
}
