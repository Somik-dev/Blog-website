@extends('layouts.dashboard')

@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">All Post</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
          @can('show_user_list')
          <form action="{{ route('delete.check') }}" method="POST">
            @csrf
            <div class="card">
                <div style="background-color:#0d6efd;" class="card-header">
                    <h2 style="color:whitesmoke">Author List <span class="float-end">Total:{{ $total_user }}</span></h2>
                </div>
                <div class="card-body">
                    <h4 class="header-title">Author List</h4>
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll"> &nbsp;Check All</th>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $sl=>$user)
                            <tr>
                                <td><input type="checkbox" name="check[]" value="{{ $user->id }}"></td>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    @can('user_delete')
                                    <a href="{{ route('delete', $user->id) }}" class="btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Delete checked</button>
                    <a href="{{ route('trash') }}" class="btn btn-primary">Trash list</a>
                </div>
                <!-- end card body-->
            </div> <!-- end card -->
        </form>
         @endcan
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection
