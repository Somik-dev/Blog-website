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
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categorires as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Post Tittle</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                         <div class="mb-3">
                            <label for="">Short Desp</label>
                            <input type="text" class="form-control" name="short_desp">
                        </div>
                        <div class="mb-3">
                            <label for="">Post Description</label>
                           <textarea name="desp" class="form-control" id="summernote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <h5 class="font-size-14 mb-2">Select Tag</h5>
                          @foreach ($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="tag_id[]"  value="{{ $tag->id }}">
                               {{ $tag->tag_name}}
                               <i class="input-frame"></i>
                              </label>
                            </label>
                        </div>
                        @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="">Featured Image</label>
                            <input type="file" class="form-control" name="feat_image">
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
