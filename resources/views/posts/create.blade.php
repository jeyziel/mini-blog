@extends('layouts.master')

@section('content')
<div class="col-md-8 blog-main">
	<h1>create post</h1>
	<hr>
	@include ('layouts.errors')
	<form method="POST" action="/posts">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">title</label>
			<input type="text" class="form-control" id="title" name="title"> 
		</div>

		<div class="form-group">
			<label for="body">body</label>
			<textarea name="body" id="body" class="form-control"></textarea>
		</div>

		@foreach($tags as $tag)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tag_id[]">
				<label class="form-check-label" for="{{ $tag->name  }}">
					{{ $tag->name  }}
				</label>
			</div>
		@endforeach

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection

