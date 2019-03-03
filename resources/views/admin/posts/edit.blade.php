@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Edit Post : {{$post->title}}
</div>
<div class="card-body">
<form action="{{route('post.update',['post' => $post->id])}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="title">Title</label>
<input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
</div>
<div class="form-group">
<img class="rounded border border-info" src="{{$post->featured}}" alt="{{$post->title}}" width="100px" height="80px">
</div>
<div class="form-group">
<label for="featured">Featured Image</label>
<input type="file" name="featured" id="" class="form-control">
</div>
<div class="form-group">
<label for="category">Select a category</label>
<select name="category_id" id="category" class="form-control">
@foreach($categories as $category)
<option  value="{{$category->id}}" 
    @if($post->category->id == $category->id)
    selected
    @endif
>{{$category->name}}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="tags">Select tags</label>
@foreach($tags as $tag)
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="defaultCheck1"
   @foreach($post->tags as $tagged)
    @if($tag->id == $tagged->id)
        checked
    @endif
  @endforeach
  >
  <label class="form-check-label" for="defaultCheck1">
    {{$tag->tag}}
  </label>
</div>
@endforeach
</div>
<div class="form-group">
<label for="content">Content</label>
<textarea name="content" id="" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Update Post</button>
    </div>
</div>
</form>
</div>
</div>


@endsection