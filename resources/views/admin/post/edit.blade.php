@extends('layouts.dashboard')

@section('content')

<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Add New Post</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Add New Post</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('post.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" name="post_id" value="{{ $post_info->id }}">
                        <div class="mb-3">
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categorires as $category)
                                <option {{ $post_info->category_id == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Post Tittle</label>
                            <input type="text" class="form-control" value="{{ $post_info->title }}" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="">Post Tittle</label>
                            <input type="text" class="form-control" value="{{ $post_info->short_desp }}" name="short_desp">
                        </div>
                        <div class="mb-3">
                            <label for="">Post Description</label>
                           <textarea name="desp" class="form-control" id="summernote" cols="30" rows="10">
                            {!! $post_info->desp !!}
                           </textarea>
                        </div>
                        <div class="mb-3">
                            <h5 class="font-size-14 mb-2">Select Tag</h5>
                         @php
                            $explode = explode(',', $post_info->tag_id);
                        @endphp

                          @foreach ($tag_mains as $tag_main)
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox"
                           @foreach ($explode as $tag_id)
                                  {{ ($tag_id == $tag_main->id?'checked':'') }}
                           @endforeach
                            class="form-check-input" name="tag_id[]"  value="{{ $tag_main->id }}">
                               {{ $tag_main->tag_name}}
                               <i class="input-frame"></i>
                              </label>
                            </label>
                        </div>
                        @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="">Featured Image</label>
                            <input  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="feat_image">
                            <div class="my-2">
                                <img width="200" id="blah" src="{{ asset('uploads/post') }}/{{ $post_info->feat_image }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
      });
</script>

@endsection
