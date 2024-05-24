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

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <h4 class="header-title">Basic Form</h4>
                                    <form  action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01" class="form-label">Full name</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="First name" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom02" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email"   id="validationCustom02" placeholder="Last name" value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom02" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" class="form-control">
                                            @if (session('error'))
                                                <strong class="text text-danger">{{ session('error') }}</strong>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom02" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->


                         <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <h4 class="header-title">Basic Form</h4>
                                    <form  action="{{ route('photo.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="validationCustom01" name="photo" placeholder="Enter Image" >
                                        </div>

                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->


                    </div>
@endsection
