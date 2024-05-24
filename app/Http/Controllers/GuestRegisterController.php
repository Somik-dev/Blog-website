<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\guestLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestRegisterController extends Controller
{
    function guest_register(){
        return view('frontend.guest_register');
    }
    function guest_login(){
        return view('frontend.guest_login');
    }
    function guest_store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
         guestLogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
             'created_at'=>Carbon::now(),
         ]);
         if(Auth::guard('guestlogin')->attempt([
            'email' => $request->email,
            'password' => $request->password])){
                  return redirect()->route('index')->with('guest_login', 'You have successfully Login');
            }else{
                return redirect()->route('guest.login');
            }
    }
}
