@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
          @can('show_user_list')
         <div class="card">
            <div style="background-color:#0d6efd;" class="card-header">
                <h2 style="color:whitesmoke">Subscriber List <span class="float-end">Total:{{ $total_subscriber }}</span></h2>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $sl=>$subscriber)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>
                                <a href="{{ route('subscriber_del', $subscriber->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
         </div>
         @endcan
        </div>
    </div>
</div>
@endsection
