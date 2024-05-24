@extends('layouts.dashboard')
@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Post view</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
               <h3>View Post</h3>
            </div>
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <img src="{{ asset('uploads/post') }}/{{ $post->feat_image }}" alt="">
                <p>{!! $post->desp !!}</p>

            </div>
        </div>
    </div>
</div>

@endsection
