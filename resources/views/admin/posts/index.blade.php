@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">Published Posts</div>
<div class="card-body">
<table class="table table-hover">
<thead>
<th>Image</th>
<th>Title</th>
<th>Edit</th>
<th>Trash</th>
</thead>
<tbody>
@if(!$posts->isEmpty())
@foreach($posts as $post)
<tr>
<td><img src="{{$post->featured}}" alt="{{$post->title}}" width="70px" height="50px"></td>
<td>{{$post->title}}</td>
<td><a href="{{route('post.edit',['post' => $post->id])}}" class="btn btn-sm btn-info">
<i class="fa fa-edit"></i>
</a></td>
<td><a href="{{route('post.delete',['post' => $post->id])}}" class="btn btn-sm btn-danger">
<i class="fa fa-trash-o"></i>
</a></td>
<td></td>
</tr>
@endforeach
@else
<tr>
<th colspan="5" class="text-center">No Post Published</th>
</tr>
@endif
</tbody>
</table>
</div>
</div>


@endsection