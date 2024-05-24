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
<div class="row">
    <form action="{{ route('all.delete.check') }}" method="POST">
        @csrf
    <div class="card">
        <div style="background-color:#0d6efd;" class="card-header">
            <h3 style="color:whitesmoke">Post List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                  <tr>
                    <th><input type="checkbox" id="checkAll">&nbsp;Check All</th>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Feat Image</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($all_posts as $sl=>$post)
                  <tr>
                    <td><input type="checkbox" name="check[]" value="{{ $post->id }}"></td>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $post->rel_to_category->category_name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                      @php
                          $after_explode = explode(',', $post->tag_id);
                      @endphp
                         @foreach ($after_explode as $tag_id)
                         @php
                             $tags = App\Models\Tag::where('id', $tag_id)->get();
                         @endphp
                             @foreach ($tags as $tag)
                                 <span class="btn btn-primary btn-sm">{{ $tag->tag_name }}</span>
                             @endforeach
                         @endforeach
                    </td>
                    <td> <img width="200" src="{{ asset('uploads/post') }}/{{ $post->feat_image }}" alt=""></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('all.post.view',$post->id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                            &nbsp;
                            <a href="{{ route('all.post.delete', $post->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                          </div>
                    </td>
                  </tr>
                  @endforeach
            </table>
            <div>
                {{ $all_posts->links() }}
             </div>
        </div>
        <div class="card-header d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Delete checked</button>
            <a href="{{ route('post.trash') }}" class="btn btn-primary">Trash list</a>
        </div>
    </div>
    </form>
</div>

@endsection
@section('footer_script')
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection
