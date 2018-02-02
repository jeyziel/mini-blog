@extends ('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
  @foreach($posts as $post)
    @include('posts.post')
  @endforeach

  <img src="{{ asset('storage/avatars/Cm5bkx2EGNnpwOjWtQzSpizKKCq1NsqG56iPaO7H.png')  }}" alt="">

  <nav class="blog-pagination">

    {{--<a class="btn btn-outline-primary" href="#">Older</a>--}}
    {{--<a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
    {{$posts->links("pagination::bootstrap-4")}}
  </nav>
</div><!-- /.blog-main -->

@endsection


