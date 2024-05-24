<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function users(){
        $users = User::where('id', '!=', Auth::id())->get();
        $total_user = User::count();
         return view('admin.users.user', compact('users','total_user'));
    }
    function users_delete($id){
     User::find($id)->Delete();
        return back();

    }
    function profile_edit(){
        return view('admin.users.profile');
    }

    function profile_update(Request $request){
       if($request->password == ''){
              User::find(Auth::id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
              ]);
              return back();
       }
       else{
         if(
         Hash::check($request->old_password, Auth::user()->password)
         ){
            User::find(Auth::id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
              ]);
              return back()->withSuccess('user updated');
         }
         else{
            return back()->with('error','password not matched');
         }
       }
    }

    function photo_update(Request $request){
             $uploaded_file = $request->photo;
             $extension = $uploaded_file->getClientOriginalExtension();
             $file_name = Auth::id().'.'.$extension;
             Image::make( $uploaded_file)->save(public_path('uploads/user/'.$file_name));
             User::find(Auth::id())->update([
                'image'=>$file_name,
             ]);
             return back();
    }

    function delete_check(Request $request){
     foreach($request->check as $check_user){
        User::find($check_user)->delete();
     }
     return back();
    }

    function trash(){
        $users = User::onlyTrashed()->where('id', '!=', Auth::id())->orderBy('name', 'asc')->get();
        $total_user = User::count();
        return view('admin.users.trash', [
            'users'=>$users,
            'total_user'=>$total_user,
        ]);
    }
    function restore($user_id){
        User::withTrashed()->find($user_id)->restore();
        return back();
    }

    function hard_delete($user_id){
        User::onlyTrashed($user_id)->forceDelete();
        return back();
    }
}
