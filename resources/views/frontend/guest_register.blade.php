@extends('frontend.master')
@section('content')
   <div class="row">
       <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Sign Up</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('guest.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="name" value="">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <button style="background-color:#FE4F70;"  type="submit" class="btn btn-danger">Sign Up</button>
                    <p class="form-group text-center">
                        Already have an account?<a href="{{ route('guest.login') }}">Login</a>
                    </p>
                  </form>
            </div>
           </div>
       </div>
    </div>
   </div>
@endsection
