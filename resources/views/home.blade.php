@extends('layouts.dashboard')

@section('content')
<div class="px-3">
@can('add_category')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashboard</h4>
            </div>
            <div class="col-lg-6">
               <div class="d-none d-lg-block">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashtrap</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
               </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Authors</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $total_user }}
                            </h2>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                   <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ route('user') }}">View</a>
                   </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Visitor</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $total_visitor }}
                            </h2>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-danger btn-sm" href="{{ route('visitor.list') }}">View</a>
                       </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Last One Month</span>
                        <h5 class="card-title mb-0"> Visitor</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               {{ $this_month_visitor }}
                            </h2>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Last One Day</span>
                        <h5 class="card-title mb-0">Visitor</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               {{ $today_visitor }}
                            </h2>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">All Time</span>
                        <h5 class="card-title mb-0">Total Subscriber</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $total_subscriber }}
                            </h2>
                        </div>
                        <div class="mt-2">
                            <a class="btn btn-secondary btn-sm" href="{{ route('subscriber.list') }}">View</a>
                           </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 57%;"></div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">All Time</span>
                        <h5 class="card-title mb-0">Total Post</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $total_post }}
                            </h2>
                        </div>
                        <div class="mt-2">
                            <a class="btn btn-warning btn-sm" href="{{ route('all.post') }}">View</a>
                           </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;"></div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>
 <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">All Time</span>
                        <h5 class="card-title mb-0">Total comments</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                    {{ $total_comments }}
                            </h2>
                        </div>
                        <div class="mt-2">
                            <a class="btn btn-success btn-sm" href="{{ route('comment.list') }}">View</a>
                           </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>





        <!-- end col-->
    </div>
    <!-- end row-->

</div> <!-- container -->
@endcan


</div>

@endsection

