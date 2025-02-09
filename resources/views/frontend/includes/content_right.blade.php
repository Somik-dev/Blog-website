<div class="col-lg-4">


    <style>
        .popular_image img{
        width:50px !important;
        height: 50px !important;
        border-radius:50%!important;
        }
        </style>

    <!-- sidebar -->
    <div class="sidebar">
        <!-- widget about -->
        <div class="widget rounded">
            <div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('frontend') }}/images/map-bg.png">
                <img src="{{ asset('frontend') }}/images/logo.svg" alt="logo" class="mb-4" />
                <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- widget popular posts -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Popular Posts</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                @foreach ($popular_posts as $popular_post)
                <!-- post -->
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">{{ $popular_post->sum }}</span>
                        <a href="{{ route('post.details',$popular_post->rel_to_post->slug) }}">
                            <div class="inner popular_image">
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

        <!-- widget categories -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Explore Topics</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <ul class="list">
                    @foreach ($categories as $category)
                      <li><a href="{{ route('category.post',$category->id) }}">{{ $category->category_name }}</a><span>{{ App\Models\Post::where('category_id', $category->id)->count() }}</span></li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- widget newsletter -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Newsletter</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                <form action="{{ route('subscriber.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <input class="form-control w-100 text-center" name="email" placeholder="Email address…" type="email">
                    </div>
                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                </form>
                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
            </div>
        </div>

        <!-- widget post carousel -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Celebration</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <div class="post-carousel-widget">
                    <!-- post -->
                    <div class="post post-carousel">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">How to</a>
                            <a href="blog-single.html">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                    <!-- post -->
                    <div class="post post-carousel">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Trending</a>
                            <a href="blog-single.html">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/widgets/widget-carousel-2.jpg" alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                    <!-- post -->
                    <div class="post post-carousel">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">How to</a>
                            <a href="blog-single.html">
                                <div class="inner">
                                    <img src="{{ asset('frontend') }}/images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                </div>
                <!-- carousel arrows -->
                <div class="slick-arrows-bot">
                    <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                    <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <!-- widget advertisement -->
        <div class="widget no-container rounded text-md-center">
            <span class="ads-title">- Sponsored Ad -</span>
            <a href="#" class="widget-ads">
                <img src="{{ asset('frontend') }}/images/ads/ad-360.png" alt="Advertisement" />
            </a>
        </div>

        <!-- widget tags -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Tag Clouds</h3>
                <img src="{{ asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                @foreach ($Tags as $Tag)
                <a href="{{ route('tag.post',$Tag->id) }}" class="tag">{{ $Tag->tag_name }}</a>
                @endforeach
            </div>
        </div>

    </div>

</div>
