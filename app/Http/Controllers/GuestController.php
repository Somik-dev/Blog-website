<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    function guest_login_req(Request $request){
        if(Auth::guard('guestlogin')->attempt([
            'email' => $request->email,
            'password' => $request->password])){
                  return redirect()->route('index')->with('guest_login', 'You have successfully Login');
            }else{
                return redirect()->route('guest.login');
            }
    }
    function guest_logout(){
        Auth::guard('guestlogin')->logout();
        return redirect()->route('guest.login');
    }

    function comment_store(Request $request){
        $request->validate([
            'comment'=>'required',
        ]);

        Comment::insert([
            'guest_id'=> Auth::guard('guestlogin')->id(),
            'post_id'=> $request->post_id,
            'comment'=> $request->comment,
            'parent_id'=> $request->parent_id,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
