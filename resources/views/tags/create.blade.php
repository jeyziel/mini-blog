@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>create Tag</h1>
        <hr>
        @include ('layouts.errors')
        <form method="POST" action="/tag/store">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Nome</label>
                <input type="text" class="form-control" id="title" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

