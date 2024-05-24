@extends('layouts.dashboard')

@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Tag</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        @can('show_tag')
        <div class="card">
            <div class="card-header">
                <h3>Tag list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Sl</th>
                        <th>Tag name</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($tags as $sl=>$tag)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endcan
    </div>
    <div class="col-lg-4">
        @can('add_tag')
        <div class="card">
            <div class="card-header">
                <h3>Add New Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Image</label>
                        <input name="tag_name" type="text" class="form-control">
                        @error('tag_name')
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
