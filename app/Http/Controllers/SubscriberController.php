<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function subscriber_store(Request $request){

        $request->validate([
            'email'=>'required|email|unique:subscribers',
        ]);

        Subscriber::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
          ]);
          return back();
    }
  function subscriber_list(){
    $subscribers = Subscriber::all();
    $total_subscriber = Subscriber::count();
    return view('admin.subscriber.subscriber_list',[
        'subscribers'=>$subscribers,
        'total_subscriber'=>$total_subscriber,
    ]);
  }

  function subscriber_del($id){
    Subscriber::find($id)->delete();
    return back();
}
}
