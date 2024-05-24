@extends('layouts.dashboard')

@section('content')

<div class="py-3 py-lg-4">
    <div class="row">
        <div class="col-lg-12">
           <div class="d-none d-lg-block">
            <ol class="breadcrumb m-0 float-start">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Social Icon</li>
            </ol>
           </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
<div style="background-color:#0d6efd;" class="card-header" class="card-header">
    <h4 style="color:whitesmoke">Socile icon List</h4>
</div>
            <div class="card-body">
                <div class="card-title">
                    <table class="table table-borderd">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        @foreach ( $sociles as $sl=>$socile )
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>
                                    <span><i class="fa {{ $socile->socile_icon }} socile_btn" style="font-family: fontawesome; font-size:30px"></i></span>
                                </td>
                                <td>
                                    <a href="{{ $socile->socile_link }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{ route('social.store.delete',$socile->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        @php
        $fonts = array(
            'fa-twitter-square',
            'fa-facebook-square',
            'fa-twitter',
            'fa-facebook',
            'fa-github',
            'fa-pinterest',
            'fa-pinterest-square',
            'fa-google-plus-square',
            'fa-google-plus',
            'fa-linkedin',
            'fa-youtube-square',
            'fa-youtube',
            'fa-stack-overflow',
            'fa-instagram',
            'fa-flickr',
            'fa-skype',
            'fa-pinterest-p',
            'fa-whatsapp',
        );
        @endphp
        <div class="card">
            <div style="background-color:#0d6efd;" class="card-header" class="card-header">
                <h4 style="color:whitesmoke">
Add New Social Icon
                </h4>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <div class="col-lg-12">
                        @foreach ( $fonts as $icon )
                            <button type="button" style="border: none" class="btn btn-info my-2">
                                <i class="fa {{ $icon }} socile_btn_s" style="font-family: fontawesome;" socile-icon-s="{{ $icon }}"></i>
                            </button>
                        @endforeach
                    </div>
                    <form action="{{ route('social.store') }}" method="POST" id="mysocile">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Socile Icon</label><br>
                            <input type="text" name="socile_icon" id="icon_name" class="form-control nice">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Socile Link</label>
                            <input type="text" name="socile_link" class="form-control" placeholder="pest your socile link">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Form submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer_script')
<script>
    $('.socile_btn_s').click(function(){
var social_icon =$(this).attr('socile-icon-s');
$('#icon_name').attr('value',social_icon);
    });
</script>
@endsection
