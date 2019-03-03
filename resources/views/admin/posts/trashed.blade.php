@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">Trashed Posts</div>
<div class="card-body">
<table class="table table-hover">
<thead>
<th>Image</th>
<th>Title</th>
<th>Edit</th>
<th>Restore</th>
<th>Destroy</th>
</thead>
<tbody>
@if(!$posts->isEmpty())
@foreach($posts as $post)
<tr>
<td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
<td>{{$post->title}}</td>
<td><a href="" class="btn btn-xs btn-info">
<i class="fa fa-edit"></i>
</a></td>
<td><a href="{{route('post.restore',['post' => $post->id])}}" class="btn btn-xs btn-success">
<i class="fa fa-undo"></i>
</a></td>
<td><a href="{{route('post.kill',['post' => $post->id])}}" class="btn btn-xs btn-danger">
<i class="fa fa-trash"></i>
</a></td>
<td></td>
</tr>
@endforeach
@else
<tr>
<th colspan="5" class="text-center">No Trashed Posts</th>
</tr>
@endif
</tbody>
</table>
</div>
</div>


@endsection