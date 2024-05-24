@extends('frontend.master')

@section('content')
<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">
                <style>
                    .picture_image img{
                    width:100% !important;
                    height: 250px !important;
                    overflow: hidden !important;
                    }
                    .pic{
                    overflow: hidden;
                    }
                    </style>
                <div class="row gy-4">
                    @forelse ($category_info as $info)
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered pic">
                            <div class="thumb top-rounded">
                                <a href="{{ route('category.post',$info->category_id) }}" class="category-badge position-absolute">{{ $info->rel_to_category->category_name }}</a>
                                <span class="post-format">
                                    <i class="icon-picture"></i>
                                </span>
                                <a href="blog-single.html" class="picture_image">
                                    <div class="inner">
                                        <img  style="width:100%;" src="{{ asset('uploads/post') }}/{{ $info->feat_image }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="{{ route('author.post',$info->author_id) }}"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $info->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $info->created_at->format('M-d-Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('post.details',$info->slug) }}">{{ $info->title }}</a></h5>
                                <p class="excerpt mb-0">{{ $info->short_desp }}</p>
                            </div>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center my-3">
                        <h3>No Post Found</h3>
                    </div>
                    @endforelse
                </div>

            </div>

          @include('frontend.includes.content_right')  -

        </div>

    </div>
</section>
@endsection
