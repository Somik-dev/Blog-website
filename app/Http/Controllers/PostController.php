<?php

namespace App\Http\Controllers;
use Str;
use Auth;
use  Image;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Mail\Alertmail;
use App\Models\Category;
use App\Jobs\Sendmailjob;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function add_post(){
        $categorires = Category::all();
        $tags = Tag::all();
        return view('admin.post.add_post',[
            'categorires'=>$categorires,
            'tags'=>$tags,
        ]);
    }
    function post_store(Request $request){
        $after_emplode = implode(',',$request->tag_id);

        $post_id = Post::insertGetId([
           'author_id'=>Auth::id(),
           'category_id'=>$request->category_id,
           'title'=>$request->title,
           'short_desp'=>$request->short_desp,
           'desp'=>$request->desp,
           'tag_id'=>$after_emplode,
           'feat_image'=>$request->feat_image,
           'slug'=> Str::lower(str_replace(' ','-', $request->title)).'-'.random_int(100000,900000),
           'created_at'=>Carbon::now(),
        ]);

        $uploaded_file = $request->feat_image;
        $extension = $uploaded_file->getClientOriginalExtension();
        $file_name = Str::lower(Auth::user()->name).'-'.random_int(100000,900000).'.'.$extension;

        Image::make($uploaded_file)->save(public_path('uploads/post/'.$file_name));

        $update = Post::find($post_id)->update([
             'feat_image'=>$file_name,
        ]);
        // dispatch(new Sendmailjob(0));
        $subscriber = Subscriber::all();
        foreach($subscriber as $subscribe){
            Mail::to($subscribe->email)->send(new Alertmail($subscribe->email));
        }
        return back();
    }

    function my_post(){
        $mypost = Post::where('author_id', Auth::id())->get();
        return view('admin.post.post',[
            'mypost'=>$mypost,
        ]);
    }

    function post_view($post_id){
        $post = Post::find($post_id);
        return view('admin.post.view',[
            'post'=>$post,
        ]);
    }

     function post_delete($post_id){

         $post_image = Post::find($post_id);
         $delete_form = public_path('uploads/post/'.$post_image->feat_image);
         unlink($delete_form);
        $post = Post::find($post_id)->delete();
         return back();

    }

    function post_edit($post_id){
        $categorires = Category::all();
        $tag_mains = Tag::all();
        $post_info = Post::find($post_id);
        return view('admin.post.edit',[
            'categorires'=>$categorires,
            'tag_mains'=>$tag_mains,
            'post_info'=>$post_info,
        ]);
    }

    function post_update(Request $request){

        $after_emplode_edit = implode(',',$request->tag_id);

        if($request->feat_image == ''){
            Post::find($request->post_id)->update([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'short_desp'=>$request->short_desp,
                'tag_id'=> $after_emplode_edit,
                'desp'=>$request->desp,
             ]);
             return back();
        }
        else{

            $post_image = Post::find($request->post_id);
            $delete_form = public_path('uploads/post/'.$post_image->feat_image);
            unlink($delete_form);

            $uploaded_file = $request->feat_image;
            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = Str::lower(Auth::user()->name).'-'.random_int(100000,900000).'.'.$extension;
            Image::make($uploaded_file)->save(public_path('uploads/post/'.$file_name));


            Post::find($request->post_id)->update([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'tag_id'=> $after_emplode_edit,
                'desp'=>$request->desp,
                'feat_image'=>$file_name,
             ]);
             return back();
        }
    }
}
