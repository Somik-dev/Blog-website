@extends('frontend.master')
@section('content')
<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="main-content">
    <div class="container-xl">

        <div class="row">

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-phone"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">Phone</h3>
                        <p class="mb-0">+1-202-555-0135</p>
                    </div>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-envelope-open"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">E-Mail</h3>
                        <p class="mb-0">hello@example.com</p>
                    </div>
                </div>
                <div class="spacer d-md-none d-lg-none" data-height="30"></div>
            </div>

            <div class="col-md-4">
                <!-- contact info item -->
                <div class="contact-item bordered rounded d-flex align-items-center">
                    <span class="icon icon-map"></span>
                    <div class="details">
                        <h3 class="mb-0 mt-0">Location</h3>
                        <p class="mb-0">California, USA</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="spacer" data-height="50"></div>

        <!-- section header -->
        <div class="section-header">
            <h3 class="section-title">Send Message</h3>
            <img src="{{  asset('frontend') }}/images/wave.svg" class="wave" alt="wave" />
        </div>

        <!-- Contact Form -->

        {{--  <form href="{{ route('info') }}" method="POST">
            @csrf
            <div class="messages"></div>

            <div class="row">
                <div class="column col-md-6">
                    <!-- Name input -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="Name">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="column col-md-6">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="email" class="form-control" name="Email">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="column col-md-12">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="Subject">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="column col-md-12">
                    <!-- Message textarea -->
                    <div class="form-group">
                        <textarea name="Message" class="form-control" rows="4"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-default">Submit Message</button><!-- Send Button -->

        </form>  --}}

        <form action="{{ route('info') }}" method="POST">
            @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Name</label>
                 <input type="text" class="form-control" name="Name">
               </div>
               <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Email</label>
                 <input type="email" class="form-control" name="Email">
               </div>
               <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Subject</label>
                <input type="text" class="form-control" name="Subject">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Massage</label>
                <textarea name="Message" class="form-control"></textarea>
            </div>
             <button type="submit" style="background-color:#fe4f4f;" class="btn btn-danger">Submit</button>
           </form>
        <!-- Contact Form end -->
    </div>
</section>
@endsection
