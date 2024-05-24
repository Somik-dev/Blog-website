<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Str;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function category(){
        $categories = Category::all();
        return view('admin.category.category',[
            'categories'=>$categories,
        ]);
    }

    function category_store(Request $request){

        $request->validate([
            'category_name'=>'required|unique:categories',
            'cat_img'=>'mimes:png,jpg',
            'cat_img'=>'file|max:512',
        ]);



       $category_id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now(),
        ]);

        $img = $request->cat_img;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace(' ','-', $request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($img)->resize(250,200)->save(public_path('uploads/categories/'.$file_name));

        Category::find($category_id)->update([
           'cat_img'=>$file_name,
        ]);
        return back();

    }
    function category_delete($category_id){

        $category_photo = Category::where('id', $category_id)->first()->cat_img;
        $delete_form = public_path('uploads/categories/'.$category_photo);
        unlink($delete_form);
        Category::find($category_id)->delete();
        return back();
    }

    function category_edit($category_id){
        $category = Category::find($category_id);
       return view('admin.category.edit',[
         'category'=>$category,
       ]);
    }


    function category_update(Request $request){
      if($request->cat_img == ''){
          Category::find($request->category_id)->update([
            'category_name'=>$request->category_name,
         ]);
         return redirect()->route('category');
      }
      else{

        $category_photo = Category::where('id', $request->category_id)->first()->cat_img;
        $delete_form = public_path('uploads/categories/'.$category_photo);
        unlink($delete_form);

        $img = $request->cat_img;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace(' ','-', $request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($img)->resize(250,200)->save(public_path('uploads/categories/'.$file_name));

        Category::find($request->category_id)->update([
            'category_name'=>$request->category_name,
            'cat_img'=>$file_name,
         ]);
         return redirect()->route('category');
      }
    }
}
