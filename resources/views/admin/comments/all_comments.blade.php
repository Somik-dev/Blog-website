@extends('layouts.dashboard')

@section('content')
<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">All Comment</li>
            </ol>
           </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                @can('show_user_list')
                <form action="{{ route('comment.check') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div style="background-color:#0d6efd;" class="card-header">
                            <h3 style="color:whitesmoke">Comment List <span class="float-right">Total: {{ $total_comments }}</span></h3>
                        </div>
                        <div class="card-body">
                            <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll">&nbsp;Check All</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_comments as $sl=>$comments)
                                <tr>
                                    <td><input type="checkbox" name="check[]" value="{{ $comments->id }}"></td>
                                    <td>{{  $comments->rel_to_guest->name }}</td>
                                  <td>{{ $comments->rel_to_guest->email }}</td>
                                    <td>{{ $comments->comment }}</td>
                                      <td><a href="{{ route('comment.view',$comments->id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></a></td>
                                    <td>
                                        @can('user_delete')
                                        <a href="{{ route('comment.delete', $comments->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <button type="submit" class="btn btn-primary">Delete Checked</button>
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
