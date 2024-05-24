
@extends('frontend.master')

@section('content')
	<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
                    <style>
                        .index_image img{
                        width:50px !important;
                        height: 50px !important;
                        border-radius:50%!important;
                        }
                        </style>
                    <!-- featured post large -->
                    @foreach ($banner_post as $banner)
                    <div class="post featured-post-lg">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">{{ $banner->rel_to_category->category_name }}</a>
                            <h2 class="post-title"><a href="{{ route('post.details',$banner->slug) }}">{{ $banner->title }}</a></h2>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ route('author.post',$banner->author_id) }}">{{ $banner->rel_to_user->name }}</a></li>
                                <li class="list-inline-item">{{ $banner->created_at->format('M-d-Y') }}</li>
                                <li class="list-inline-item">{{ $banner->created_at->diffforhumans() }}</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner data-bg-image w-100" data-bg-image="{{ asset('uploads/post') }}/{{ $banner->feat_image }}"></div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>

                <div class="col-lg-4">
                    <!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
                                @foreach ($popular_posts as $popular_post)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $popular_post->sum }}</span>
                                        <a href="{{ route('post.details',$popular_post->rel_to_post->slug) }}">
                                            <div class="inner index_image">
                                                <img src="{{ asset('uploads/post') }}/{{ $popular_post->rel_to_post->feat_image }}" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('post.details',$popular_post->rel_to_post->slug) }}">{{ $popular_post->rel_to_post->title }}</h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $popular_post->rel_to_post->created_at->format('M-d-Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
							</div>
							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
							  @foreach ($popular_post2 as $popular_post)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $popular_post->sum }}</span>
                                        <a href="{{ route('post.details',$popular_post->rel_to_post->slug) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/post') }}/{{ $popular_post->rel_to_post->feat_image }}" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('post.details',$popular_post->rel_to_post->slug) }}">{{ $popular_post->rel_to_post->title }}</h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $popular_post->rel_to_post->created_at->format('M-d-Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">
            <div class="col-lg-8">

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Editor’s Pick</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            @foreach ($edit_post1 as $post)
                            <!-- post -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a class="category-badge position-absolute" href="{{ route('category.post',$post->category_id) }}">{{ $post->rel_to_category->category_name }}</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $post->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="{{ route('author.post',$post->author_id) }}"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $post->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $post->created_at->format('M-d-Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h5>
                                <p class="excerpt mb-0">{{ $post->short_desp }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($edit_post as $post)
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $post->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">{{ $post->created_at->format('M-d-Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- horizontal ads -->
                <div class="ads-horizontal text-md-center">
                    <span class="ads-title">- Sponsored Ad -</span>
                    <a href="#">
                        <img src="{{ asset('frontend') }}/images/ads/ad-750.png" alt="Advertisement" />
                    </a>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Trending</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <!-- post large -->
                            @foreach ($trending_post1 as $trending_post)
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Culture</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $trending_post->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="{{ route('author.post',$trending_post->author_id) }}"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $trending_post->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $trending_post->created_at->format('M-d-Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('post.details',$trending_post->slug) }}">{{ $trending_post->title }}</a></h5>
                                <p class="excerpt mb-0">{{ $trending_post->short_desp }}</p>
                            </div>
                             @endforeach

                         @foreach ($trending_posts as $trending_post)
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $trending_post->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="{{ route('post.details',$trending_post->slug) }}">{{ $trending_post->title }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="col-sm-6">
                            <!-- post large -->
                            @foreach ($trending_post2 as $trending_post)
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Lifestyle</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $trending_post->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="{{ route('author.post',$trending_post->author_id) }}"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $trending_post->rel_to_user->name }}</a></li>
                                    <li class="list-inline-item">{{ $trending_post->created_at->format('M-d-Y') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('post.details',$trending_post->slug) }}">{{ $trending_post->title }}</a></h5>
                                <p class="excerpt mb-0">{{ $trending_post->short_desp }}</p>
                            </div>
                            @endforeach
                            <!-- post -->
                                @foreach ($trending_posts3 as $trending_post)
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="blog-single.html">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/post') }}/{{ $trending_post->feat_image }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('post.details',$trending_post->slug) }}">{{ $trending_post->title }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Inspiration</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                    <div class="slick-arrows-top">
                        <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                        <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>

                <div class="row post-carousel-twoCol post-carousel">
                    @foreach ($inspiration_posts as $inspiration_post)
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="{{ route('category.post',$inspiration_post->category_id) }}" class="category-badge">{{ $inspiration_post->rel_to_category->category_name }}</a>
                            <h4 class="post-title"><a href="{{ route('post.details',$inspiration_post->slug) }}">{{ $inspiration_post->title }}</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ route('author.post',$inspiration_post->author_id) }}">{{ $inspiration_post->rel_to_user->name }}</a></li>
                                <li class="list-inline-item">{{ $inspiration_post->created_at->format('M-d-Y') }}</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="{{ asset('uploads/post') }}/{{ $inspiration_post->feat_image }}" alt="post-title" />
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="spacer" data-height="50"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Latest Posts</h3>
                    <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
                </div>

                <div class="padding-30 rounded bordered">

                    <div class="row">
                         @foreach ($latest_post as $latest)
                        <div class="col-md-12 col-sm-6">
                            <!-- post -->
                            <div class="post post-list clearfix">
                                <div class="thumb rounded">
                                    <span class="post-format-sm">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('uploads/post') }}/{{ $latest->feat_image }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-3">
                                        <li class="list-inline-item"><a href="#"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>{{ $latest->rel_to_user->name }}</a></li>
                                        <li class="list-inline-item"><a href="{{ route('category.post',$latest->category_id) }}">{{ $latest->rel_to_category->category_name }}</a></li>
                                        <li class="list-inline-item">{{ $latest->created_at->format('M-d-Y') }}</li>
                                    </ul>
                                    <h5 class="post-title"><a href="{{ route('post.details',$latest->slug) }}">{{ $latest->title }}</a></h5>
                                    <p class="excerpt mb-0">{{ $latest->short_desp }}</p>
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
                                            <a href="{{ route('post.details',$latest->slug) }}"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         <div>
                            {{ $latest_post->links() }}
                         </div>
                    </div>

                </div>

            </div>
            @include('frontend.includes.content_right')
			</div>
		</div>
	</section>
    @endsection


@section('footer_script')
@if (session('guest_login'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "{{ session('guest_login') }}",
      });
</script>
@endif
@endsection




