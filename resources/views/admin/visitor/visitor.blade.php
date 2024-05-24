@extends('layouts.dashboard')
@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Visitor</li>
            </ol>
           </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
          @can('show_user_list')
          <form action="{{ route('visitor.delete.check') }}" method="POST">
            @csrf
         <div class="card">
            <div style="background-color:#0d6efd;" class="card-header">
                <h2 style="color:whitesmoke">Visitor List <span class="float-end">Total:{{ $total_visitor }}</span></h2>
            </div>
            <div class="card-body">
                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll">Check All</th>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $sl=>$visitor)
                        <tr>
                            <td><input type="checkbox" name="check[]" value="{{ $visitor->id }}"></td>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $visitor->name }}</td>
                            <td>{{ $visitor->email }}</td>
                            <td>
                                @can('user_delete')
                                <a href="{{ route('visitor.delete', $visitor->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
         </div>
         <div class="card-header d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Delete checked</button>
            <a href="{{ route('visitor.trash') }}" class="btn btn-primary">Trash list</a>
        </div>
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
