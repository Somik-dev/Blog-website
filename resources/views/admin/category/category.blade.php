@extends('layouts.dashboard')

@section('content')

<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
           </div>
        </div>
    </div>
</div>

<div class="row">
    @can('show_category')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Basic Data Table</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($categories as $sl=>$category)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td><img class="rounded" width="50px" src="{{ asset('/uploads/categories') }}/{{ $category->cat_img }}" alt=""></td>
                            <td>
                                <div class="d-flex">

                                    @can('category_update')
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                                    @endcan

                                             &nbsp;
                                             <form action="{{ route('category.del',$category->id) }}">
                                                @csrf
                                                <a class="btn delete btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                                               </form>
                                 </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
    @else
     <div class="col-lg-4 m-auto">
        <div class="card">
            <div class="card-header text-center">
                <h3>you have no access on this page</h3>
            </div>
        </div>
     </div>
    @endcan
    <div class="col-lg-4">
        @can('add_category')
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add Category</h6>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category Name</label>
                      <input name="category_name" type="text" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        @endcan
    </div>
</div>

@endsection
