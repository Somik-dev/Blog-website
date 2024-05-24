@extends('layouts.dashboard')
@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">All Post</li>
            </ol>
           </div>
        </div>
    </div>
</div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Trash List</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $sl=>$user)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @can('user_delete')
                                    <a href="{{ route('user.restore', $user->id) }}" class="btn btn-success">Restore</a>
                                    <a href="{{ route('user.delete.hard', $user->id) }}" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
             </div>
        </div>
    </div>
  </div>
@endsection
