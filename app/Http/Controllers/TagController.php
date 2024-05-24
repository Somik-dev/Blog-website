<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag(){
        $tags = Tag::all();
        return view('admin.Tag.tag',[
            'tags'=>$tags,
        ]);
    }

    function tag_store(Request $request){
         $request->validate([
          'tag_name'=>'required',
          'tag_name'=>'unique:tags',
         ],[
            'tag_name.required'=>'enter tag name',
         ]);


         Tag::insert([
           'tag_name'=>$request->tag_name,
           'created_at'=>Carbon::now(),
         ]);
         return back();
    }

    function tag_post($tag_id){
        $all = '';
        foreach(Post::all() as $post){
            $explode = explode(',', $post->tag_id);
            if(in_array($tag_id, $explode)){
               $all .= $post->id. ',';
            }
        }
        $explode2 = explode(',', $all);
        $bolg_post = Post::find( $explode2);
        return view('frontend.tag_post',[
            'bolg_post'=>$bolg_post,
        ]);
    }
}
