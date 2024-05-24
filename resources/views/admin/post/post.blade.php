@extends('layouts.dashboard')

@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
            </ol>
           </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Post List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Feat Image</th>
                    <th>Action</th>
                  </tr>

                  @foreach ($mypost as $sl=>$post)
                  <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $post->rel_to_category->category_name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                      @php
                          $after_explode = explode(',', $post->tag_id);
                      @endphp
                         @foreach ($after_explode as $tag_id)
                         @php
                             $tags = App\Models\Tag::where('id', $tag_id)->get();
                         @endphp
                             @foreach ($tags as $tag)
                                 <span class="btn btn-primary btn-sm">{{ $tag->tag_name }}</span>
                             @endforeach
                         @endforeach
                    </td>
                    <td> <img width="200" src="{{ asset('uploads/post') }}/{{ $post->feat_image }}" alt=""></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('post.view',$post->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-eye"></i></a>
                            &nbsp;
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                                &nbsp;
                            <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                          </div>
                    </td>
                  </tr>
                  @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
