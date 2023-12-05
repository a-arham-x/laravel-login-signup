<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    function login(){
        return view("login");
    }

    function signup(){
        return view("signup");
    }

    function userLogin(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)){
            return redirect(route("home"));
        }else{
            return redirect(route("login"))->with("error", "Login Details are not valid");
        }
    }

    function userSignup(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["password"] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user){
            return redirect(route("signup"))->with("error", "Signup Details are not valid");
        }else{
            return redirect(route("login"))->with("success", "Signup has been successful");
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route("login"));
    }
}
