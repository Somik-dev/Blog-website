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
        <div class="col-lg-8 m-auto">
          @can('show_user_list')
          <form action="{{ route('visitor.delete.check') }}" method="POST">
            @csrf
         <div class="card">
            <div class="card-header">
                <h2>Visitor List <span class="float-end">Total:{{ $total_user }}</span></h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th><input type="checkbox" id="checkAll">Check All</th>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Email</th>
                    </tr>
                    @foreach ($visitors as $sl=>$visitor)
                        <tr>
                            <td><input type="checkbox" name="check[]" value="{{ $visitor->id }}"></td>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $visitor->name }}</td>
                            <td>{{ $visitor->email }}</td>
                            <td>
                                @can('user_delete')
                                <a href="{{ route('visitor.restore', $visitor->id) }}" class="btn btn-success">Restore</a>
                                <a href="{{ route('visitor.delete.hard', $visitor->id) }}" class="btn btn-danger">Delete</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
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
