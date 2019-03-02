@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">
Create New Post
</div>
<div class="card-body">
<form action="{{route('post.store')}}" method="post">
@csrf
<div class="form-group">
<label for="title">Title</label>
<input type="text" name="title" id="" class="form-control">
</div>
<div class="form-group">
<label for="featured">Featured Image</label>
<input type="file" name="featured" id="" class="form-control">
</div>
<div class="form-group">
<label for="content">Content</label>
<textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea>
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Store Post</button>
    </div>
</div>
</form>
</div>
</div>


@endsection