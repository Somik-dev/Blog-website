<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Contract;
use App\Models\MostPost;
use App\Models\PopularPost;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    function welcome(){
        $banner_post = Post::latest('created_at')->take(1)->get();
         $latest_post = Post::latest('created_at')->take(4)->paginate(4);
         $edit_post = Post::latest('created_at')->where('category_id',23)->take(4)->get();
         $edit_post1 = Post::where('category_id',23)->take(1)->get();
         $latest_post2 = Post::latest('created_at')->where('category_id',9)->take(4)->get();
        $categories = Category::all();
        $Tags = Tag::all();
        $inspiration_posts = Post::where('category_id',6)->take(2)->get();
        $trending_post1 = Post::where('category_id',9)->take(1)->get();
         $trending_post2 = Post::where('category_id',9)->first()->take(1)->get();
        $trending_posts = Post::where('category_id',9)->latest()->take(2)->get();
        $trending_posts3 = Post::where('category_id',6)->latest()->take(2)->get();



                $popular_posts =MostPost::groupBy('post_id')
                ->selectRaw('post_id, sum(total_read) as sum')
                ->orderBy('sum','DESC')
                ->take(4)
                ->get();

                 $popular_post2 =MostPost::groupBy('post_id')
                ->selectRaw('post_id, sum(total_read) as sum')
                ->take(4)
                ->get();




        return view('frontend.index',[
            'banner_post'=>$banner_post,
            'categories'=>$categories,
            'latest_post'=>$latest_post,
            'Tags'=>$Tags,
            'inspiration_posts'=>$inspiration_posts,
            'trending_post1'=>$trending_post1,
            'trending_post2'=>$trending_post2,
            'trending_posts'=>$trending_posts,
            'trending_posts3'=>$trending_posts3,
            'popular_posts'=>$popular_posts,
            'popular_post2'=>$popular_post2,
            'edit_post'=>$edit_post,
            'edit_post1'=>$edit_post1,
        ]);
    }

    function category_post($category_id){

        $categories = Category::all();
        $Tags = Tag::all();
        $category_info = Category::find($category_id);
        $category_posts = Post::where('category_id', $category_id)->get();

        $popular_posts =MostPost::groupBy('post_id')
        ->selectRaw('post_id, sum(total_read) as sum')
        ->orderBy('sum','DESC')
        ->take(4)
        ->get();



        return view('frontend.category_post',[
            'category_posts'=>$category_posts,
            'categories'=>$categories,
            'Tags'=>$Tags,
            'category_info'=>$category_info,
            'popular_posts'=>$popular_posts,

        ]);
    }

    function author_post($author_id){
        $categories = Category::all();
        $Tags = Tag::all();
        $author_info = User::find($author_id);
        $author_posts = Post::where('author_id', $author_id)->take(9)->paginate(9);


        $popular_posts =MostPost::groupBy('post_id')
        ->selectRaw('post_id, sum(total_read) as sum')
        ->orderBy('sum','DESC')
        ->take(4)
        ->get();

        return view('frontend.Author_post',[
            'author_posts'=>$author_posts,
            'categories'=>$categories,
            'Tags'=>$Tags,
            'author_info'=>$author_info,
            'popular_posts'=>$popular_posts,

        ]);
    }

    function author_list(){
        return view('frontend.author_list');
    }

   function post_details($slug){
    $post_details = Post::where('slug', $slug)->get();



   if(MostPost::where('post_id',$post_details->first()->id)->exists()){
    MostPost::where('post_id',$post_details->first()->id)->increment('total_read',1);
   }else{
    MostPost::insert([
        'post_id'=>$post_details->first()->id,
        'total_read'=>1,
         'created_at'=>Carbon::now(),
     ]);
   }

            $popular_posts =MostPost::groupBy('post_id')
            ->selectRaw('post_id, sum(total_read) as sum')
            ->orderBy('sum','DESC')
            ->take(4)
            ->get();


     $comments = Comment::with('replies')->where('post_id', $post_details->first()->id)->whereNull('parent_id')->get();
    $categories = Category::all();
    $Tags = Tag::all();
    return view('frontend.post',[
        'categories'=>$categories,
        'Tags'=>$Tags,
        'post_details'=>$post_details,
        'comments'=>$comments,
        'popular_posts'=>$popular_posts,

    ]);
   }
 function search(Request $request){
    $categories = Category::all();
    $Tags = Tag::all();

    $data = $request->all();
    $bolg_post = Post::where(function($q) use ($data){
        if(!empty($data['scearch_input']) && $data['scearch_input'] != '' && $data['scearch_input'] != 'undefind'){
            $q->where(function($q) use ($data){
                $q->where('title','like', '%'.$data['scearch_input'].'%');
                $q->orwhere('short_desp','like', '%'.$data['scearch_input'].'%');
                $q->orwhere('desp','like', '%'.$data['scearch_input'].'%');
            });
        }
    })->latest()->get();


    return view('frontend.search',[
        'bolg_post'=>$bolg_post,
        'categories'=>$categories,
        'Tags'=>$Tags,
    ]);
 }
 function category_allpost(){
    $category_info = Post::all();
    $categories = Category::all();
    $Tags = Tag::all();
    $popular_posts =MostPost::groupBy('post_id')
    ->selectRaw('post_id, sum(total_read) as sum')
    ->orderBy('sum','DESC')
    ->take(4)
    ->get();
   return view('frontend.category_allpost',[
      'category_info'=>$category_info,
      'categories'=>$categories,
      'Tags'=>$Tags,
      'popular_posts'=>$popular_posts,
   ]);
 }

            function contract(){
        return view('frontend.contract');
            }

function info(Request $request){
    $request->validate([
        'Name'=>'required',
        'Email'=>'required',
        'Subject'=>'required',
        'Message'=>'required',
    ]);
    Contract::insert([
        'Name'=>$request->Name,
        'Email'=>$request->Email,
        'Subject'=>$request->Subject,
        'Message'=>$request->Message,
         'created_at'=>Carbon::now(),
     ]);

        return back();

}

        function about(){
            $categories = Category::all();
            $Tags = Tag::all();
            $popular_posts =MostPost::groupBy('post_id')
            ->selectRaw('post_id, sum(total_read) as sum')
            ->orderBy('sum','DESC')
            ->take(4)
            ->get();
        return view('frontend.about',[
            'categories'=>$categories,
            'Tags'=>$Tags,
            'popular_posts'=>$popular_posts,
        ]);
        }
}
