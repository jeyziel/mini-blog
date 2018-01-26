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

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection

