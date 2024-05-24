<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
            function social_icon(){
            $sociles =social::all();
            return view('admin.social.social',[
            'sociles'=>$sociles,
            ]);
            }


    function social_store(Request $request){
        social::insert([
            'user_id'=>Auth::id(),
            'socile_icon'=>$request->socile_icon,
            'socile_link'=>$request->socile_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','socile icon store successfully');
    }

    function social_store_delete($id){
        social::find($id)->delete();
        return back()->with('delete','socile icon delete successfully');
    }
}
