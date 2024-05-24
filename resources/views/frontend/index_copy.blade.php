@extends('frontend.master')

@section('content')


<!-- hero section -->
<section id="hero">

    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <!-- featured post large -->
                @foreach ($banner_post as $banner)
                <div class="post featured-post-lg">
                    <div class="details clearfix">
                        <a href="category.html" class="category-badge">{{ $banner->rel_to_category->category_name }}</a>
                        <h2 class="post-title"><a href="blog-single.html">{{ $banner->title }}</a></h2>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="#">{{ $banner->rel_to_user->name }}</a></li>
                            <li class="list-inline-item">{{ $banner->created_at->format('M-d-Y') }}</li>
                            <li class="list-inline-item">{{ $banner->created_at->diffforhumans() }}</li>
                        </ul>
                    </div>
                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image" data-bg-image="{{ asset('uploads/post') }}/{{ $banner->feat_image }}"></div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

            <div class="col-lg-4">
                 @include('frontend.includes.uperightbar')
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
                            <!-- post -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Lifestyle</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/editor-lg.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="#"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h5>
                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/editor-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/editor-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/editor-sm-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/editor-sm-4.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
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
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Culture</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-lg-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="#"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-sm-1.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-sm-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- post large -->
                            <div class="post">
                                <div class="thumb rounded">
                                    <a href="category.html" class="category-badge position-absolute">Inspiration</a>
                                    <span class="post-format">
                                        <i class="icon-earphones"></i>
                                    </span>
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-lg-2.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item"><a href="#"><img src="{{ asset('frontend') }}/images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-sm-3.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">Here Are 8 Ways To Success Faster</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post -->
                            <div class="post post-list-sm square before-seperator">
                                <div class="thumb rounded">
                                    <a href="blog-single.html">
                                        <div class="inner">
                                            <img src="{{ asset('frontend') }}/images/posts/trending-sm-4.jpg" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                            </div>
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
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing Tattoo?</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/posts/inspiration-1.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/posts/inspiration-2.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- post -->
                    <div class="post post-over-content col-md-6">
                        <div class="details clearfix">
                            <a href="category.html" class="category-badge">Inspiration</a>
                            <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">29 March 2021</li>
                            </ul>
                        </div>
                        <a href="blog-single.html">
                            <div class="thumb rounded">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/posts/inspiration-3.jpg" alt="thumb" />
                                </div>
                            </div>
                        </a>
                    </div>
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
                                        <li class="list-inline-item"><a href="#">{{ $latest->rel_to_category->category_name }}</a></li>
                                        <li class="list-inline-item">{{ $latest->created_at->format('M-d-Y') }}</li>
                                    </ul>
                                    <h5 class="post-title"><a href="blog-single.html">{{ $latest->title }}</a></h5>
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
                        </div>
                        @endforeach
                         <div>
                            {{ $latest_post->links() }}
                         </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4">
               @include('frontend.includes.lowerightbar')
            </div>

        </div>

    </div>
</section>
@endsection