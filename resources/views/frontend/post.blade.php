@extends('frontend.master')
@section('content')
	<!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Inspiration</a></li>
                    <li class="breadcrumb-item active" aria-current="page">3 Easy Ways To Make Your iPhone Faster</li>
                </ol>
            </nav>

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post header -->
						<div class="post-header">
							<h1 class="title mt-0 mb-3">{{ $post_details->first()->title }}</h1>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="#">

                                    @if ($post_details->first()->image == null)
                                        <img style="width: 30px;" src="{{ Avatar::create($post_details->first()->rel_to_user->name)->toBase64() }}" />
                                        @else
                                        <img style="width: 30px;" src="{{ asset('uploads/user') }}/{{ $post_details->first()->image }}" alt="user-image" class="rounded-circle">
                                        @endif

                                    {{ $post_details->first()->rel_to_user->name }}</a></li>
								<li class="list-inline-item"><a href="#">{{ $post_details->first()->rel_to_category->category_name }}</a></li>
								<li class="list-inline-item">{{ $post_details->first()->created_at->format('M-d-Y') }}</li>
							</ul>
						</div>
						<!-- featured image -->
						<div class="featured-image">
							<img src="{{ asset('uploads/post') }}/{{ $post_details->first()->feat_image }}" alt="post-title" />
						</div>
						<!-- post content -->
						<div class="post-content clearfix">
                                {!!$post_details->first()->desp!!}
                        </div>
						<!-- post bottom section -->
						<div class="post-bottom">
							<div class="row d-flex align-items-center">
								<div class="col-md-6 col-12 text-center text-md-start">
									<!-- tags -->
                                @php
                                    $after_explode = explode(',', $post_details->first()->tag_id);
                                @endphp
                                   @foreach ($after_explode as $tag_id)
                                   @php
                                       $tags = App\Models\Tag::where('id', $tag_id)->get();
                                   @endphp
                                       @foreach ($tags as $tag)
                                       <a href="#" class="tag">{{ $tag->tag_name }}</a>
                                       @endforeach
                                   @endforeach
								</div>
								<div class="col-md-6 col-12">
									<!-- social icons -->
									<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
										<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
                            @if ($post_details->first()->image == null)
                            <img src="{{ Avatar::create($post_details->first()->rel_to_user->name)->toBase64() }}" />
                            @else
                            <img src="{{ asset('uploads/user') }}/{{ $post_details->first()->image }}" alt="user-image" class="rounded-circle">
                            @endif
						</div>
						<div class="details">
							<h4 class="name"><a href="#"> {{ $post_details->first()->rel_to_user->name }}</a></h4>
							<p>{{ $post_details->first()->short_desp }}</p>
							<!-- social icons -->
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

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">{{ $comments->count() >1 ? 'Comments':'Commentk' }} ({{ $comments->count() }})</h3>
						<img src="{{  asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">
                        <ul class="comments">

							<!-- comment item -->
                             @foreach ($comments as $comment)
                                <li class="comment rounded">
                                    <div class="thumb">
										@if ($comment->rel_to_guest->name)
										<img width="60" src="{{ Avatar::create($comment->rel_to_guest->name)->toBase64() }}" />
										@else
										<img src="{{ asset('uploads/user') }}/{{ $comment->rel_to_guest->image }}" alt="user-image" class="rounded-circle">
										@endif
                                    </div>
                                    <div class="details">
                                        <h4 class="name"><a href="#">{{ $comment->rel_to_guest->name }}</a></h4>
										<span class="date">{{ $comment->created_at->toDayDateTimeString() }}</span>
                                        <p>{{ $comment->comment }}</p>
                                        <a href="#reply_form" data_parent="{{ $comment->id }}" class="btn btn-default btn-sm btn-replay">Reply</a>
                                    </div>
                                </li>

                                @foreach ($comment->replies as $replay)
                                    <li class="comment child rounded">
                                        <div class="thumb">
                                            @if ($replay->rel_to_guest->name)
                                            <img width="40" src="{{ Avatar::create($replay->rel_to_guest->name)->toBase64() }}" />
                                            @else
                                            <img src="{{ asset('uploads/user') }}/{{ $replay->rel_to_guest->image }}" alt="user-image" class="rounded-circle">
                                            @endif
                                        </div>
                                        <div class="details">
                                            <h4 class="name"><a href="#">{{ $replay->rel_to_guest->name }}</a></h4>
                                            <span class="date">{{ $replay->created_at->toDayDateTimeString()  }}</span>
                                            <p>{{ $replay->comment }}</p>
                                            <a href="#reply_form" data_reply_id="{{ $replay->id }}" class="btn btn-default btn-sm btn-replay">Reply</a>
                                        </div>
                                    </li>
                                        @foreach (App\Models\Comment::where('parent_id',$replay->id)->get() as $item)
                                            <li class="comment child rounded" style="margin-left: 120px;">
                                                <div class="thumb">
                                                    @if ($item->rel_to_guest->name)
                                                    <img width="40" src="{{ Avatar::create($item->rel_to_guest->name)->toBase64() }}" />
                                                    @else
                                                    <img src="{{ asset('uploads/user') }}/{{ $item->rel_to_guest->image }}" alt="user-image" class="rounded-circle">
                                                    @endif
                                                </div>
                                                <div class="details">
                                                    <h4 class="name"><a href="#">{{ $item->rel_to_guest->name }}</a></h4>
                                                    <span class="date">{{ $replay->created_at->toDayDateTimeString()  }}</span>
                                                    <p>{{ $item->comment }}</p>
                                                    <a href="#reply_form" data_reply_id="{{ $item->id }}" class="btn btn-default btn-sm btn-replay">Reply</a>
                                                </div>
                                            </li>
                                        @endforeach
                                @endforeach
                            @endforeach
							<!-- comment item -->

						</ul>
					</div>

					<div class="spacer" data-height="50"></div>
                    @auth('guestlogin')
                    <!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{  asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30" id="reply_form">

						<form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                        <input type="hidden" name="parent_id" id="parent_replay">
                        <input type="hidden" name="post_id" class="parent" value="{{ $post_details->first()->id }}">
							<div class="messages"></div>

							<div class="row">
								<div class="column col-md-6">
									<!-- Name input -->
									<div class="form-group">
										<input type="text" readonly value="{{ Auth::guard('guestlogin')->user()->name }}" class="form-control" placeholder="Website" required="required">
									</div>
								</div>
								<div class="column col-md-6">
									<!-- Email input -->
									<div class="form-group">
										<input type="email" readonly class="form-control" value="{{ Auth::guard('guestlogin')->user()->email }}" placeholder="Email address" required="required">
									</div>
								</div>
                                <div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="comment" class="form-control" rows="4" placeholder="Your comment here..."></textarea>
									</div>

								</div>
							</div>

							<button type="submit" class="btn btn-default">Submit</button><!-- Submit Button -->

						</form>
					</div>
                    @else
                    <div class="alert alert-warning">
                          <h3>Please login to leave a comment <a class="btn btn-success" href="{{ route('guest.login') }}">Login here</a></h3>
                    </div>
                    @endauth

                </div>

                @include('frontend.includes.content_right')
			</div>

		</div>
	</section>
@endsection
@section('footer_script')
	<script>
		$('.btn-replay').click(function(){
let parent_id = $(this).attr('data_parent');
$('#parent_replay').attr('value',parent_id);
		});
	</script>
        <script>
$('.btn-replay').click(function(){
let reply_id=$(this).attr('data_reply_id');
$('#parent_replay').attr('value',reply_id);
});
        </script>
@endsection
