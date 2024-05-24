<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\guestLogin;
use Notification;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\makePostNotification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $total_user = User::count();
        $total_post = Post::count();
        $total_comments = Comment::count();
        $total_visitor = guestLogin::count();
        $today_date = Carbon::now()->format('Y-m-d');
        $this_month = Carbon::now()->format('M');
        $today_visitor = guestLogin::whereDate('created_at',$today_date)->count();
        $this_month_visitor = guestLogin::whereDate('created_at',$this_month)->count();
        $total_subscriber = Subscriber::count();
        return view('home',[
            'total_user'=> $total_user,
            'total_post'=> $total_post,
            'total_visitor'=> $total_visitor,
            'total_comments'=> $total_comments,
            'today_visitor'=> $today_visitor,
            'this_month_visitor'=> $this_month_visitor,
            'total_subscriber'=> $total_subscriber,
        ]);
    }

//All Post////////

            function all_post(){
                $all_posts = Post::latest('created_at')->take(5)->paginate(5);
                return view('admin.Allpost.allpost',[
                    'all_posts'=>$all_posts,
                ]);
            }

            function all_post_view($post_id){
                $post = Post::find($post_id);
                return view('admin.Allpost.allpost_view',[
                    'post'=>$post,
                ]);
            }

            function all_post_delete($post_id){
                $post = Post::find($post_id)->Delete();
                return back();
            }
            function all_delete_check(Request $request){
                foreach($request->check as $check_user){
                    Post::find($check_user)->Delete();
                }
                return back();
            }

        function post_trash(){
            $all_trashs = Post::onlyTrashed()->get();
            $total_user = Post::count();
            return view('admin.Allpost.allpost_trash', [
                'all_trashs'=>$all_trashs,
                'total_user'=>$total_user,
            ]);
        }

        function all_restore($id){
            Post::onlyTrashed()->find($id)->restore();
            return back();
        }

        function all_hard_delete($id){
        $post = Post::onlyTrashed()->find($id);
        $img = public_path('uploads/post/'.$post->feat_image);
        unlink($img);
            Post::onlyTrashed($id)->forceDelete();
            return back();
        }


//vistor////

        function visitor_list(){
            $visitors = guestLogin::latest()->get();
            $total_visitor = guestLogin::count();
            return view('admin.visitor.visitor',[
                'visitors'=>$visitors,
                'total_visitor'=>$total_visitor,
            ]);
        }
        function visitor_delete($id){
            guestLogin::find($id)->Delete();
            return back();
        }

        function visitor_delete_check(Request $request){
            foreach($request->check as $check_user){
                guestLogin::find($check_user)->Delete();
            }
            return back();
        }

                function visitor_trash(){
                    $visitors = guestLogin::onlyTrashed()->where('id', '!=', Auth::id())->orderBy('name', 'asc')->get();
                    $total_user = guestLogin::count();
                    return view('admin.visitor.visitor_trash', [
                        'visitors'=>$visitors,
                        'total_user'=>$total_user,
                    ]);
                }

                function visitor_restore($user_id){
                    guestLogin::withTrashed()->find($user_id)->restore();
                    return back();
                }

                function visitor_hard_delete($user_id){
                    guestLogin::onlyTrashed($user_id)->forceDelete();
                    return back();
                }



//comments
            function comment_list(){
            $all_comments =Comment::with('replies')->get();
            $total_comments = Comment::count();
            return view('admin.comments.all_comments',[
            'all_comments'=>$all_comments,
            'total_comments'=>$total_comments,
            ]);
            }


            function comment_check(Request $request){
                if($request->check == ''){
                    return back()->with('nai', 'no data selected');
                }
                else{
                    foreach($request->check as $check_user){
                        Comment::find($check_user)->delete();
                    }
                    return back();
                }

            }
            function comment_delete($comment_id){
                Comment::find($comment_id)->delete();
                return back();
            }


    public function notify(){
        $user = User::first();
        auth()->user()->notify(new makePostNotification($user));

}

                function comment_view($id){
                    // $post_details = Post::where('slug', $slug)->get();
                    // return view('frontend.post',[
                    // 'post_details'=>$post_details,
                    // ]);
                    Comment::find($id)->update([
                        'status'=>0
                    ]);
                        return back();
                }

}
