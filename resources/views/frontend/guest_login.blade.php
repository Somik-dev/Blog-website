@extends('frontend.master')
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
     <div class="card">
         <div class="card-header">
             <h3>Login</h3>
         </div>
         <div class="card-body">
             <form action="{{ route('guest.login.req') }}" method="POST">
                @csrf
                 <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Email</label>
                     <input type="email" class="form-control" name="email">
                   </div>
                 <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Password</label>
                   <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                 </div>
                 <button type="submit" style="background-color:#fe4f4f;" class="btn btn-danger w-100">Login</button>
               </form>
              {{--  <div class="d-flex mb-2 my-2">
                <a class="btn btn-info w-100" href="">Login with <img width="30" src="https://i.postimg.cc/k5V2MYQz/002-github-1.png" alt=""></a>
                <a class="btn btn-info w-100" href="">Login with <img width="30" src="https://i.postimg.cc/25PV1dT6/003-google.png" alt=""></a>
              </div>  --}}
             <p class="form-group text-center">
                 Have no account?<a href="{{ route('guest.register') }}">Create One</a>
            </p>
         </div>
        </div>
    </div>
 </div>
</div>
@endsection
