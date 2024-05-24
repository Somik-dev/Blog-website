@extends('layouts.dashboard')
@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Edit Category</h6>
            <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="hidden" name="category_id" value="{{ $category->id }}">
                  <input value="{{ $category->category_name }}" name="category_name" type="text" class="form-control">
                  @error('category_name')
                          <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Category Image</label>
                  <input name="cat_img" type="file" class="form-control">
                  @error('cat_img')
                  <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                 <div class="mt-2">
                    <img src="{{ asset('uploads/categories') }}/{{ $category->cat_img }}" alt="">
                 </div>
                <button type="submit" class="btn btn-primary">update</button>
              </form>
        </div>
    </div>
</div>
@endsection
