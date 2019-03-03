@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">Tags</div>
<div class="card-body">
<table class="table table-hover">
<thead>
<th>Tag Name</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
@if(!$tags->isEmpty())
@foreach($tags as $tag)
<tr>
<td>{{$tag->tag}}</td>
<td><a href="{{ route('tag.edit',['tag'=> $tag->id]) }}" class="btn btn-xs btn-info">
<i class="fa fa-edit"></i>
</a></td>
<td><a href="{{route('tag.delete',['tag'=> $tag->id])}}" class="btn btn-xs btn-danger">
<i class="fa fa-trash"></i>
</a></td>
<td></td>
</tr>
@endforeach
@else
<tr>
<th colspan="3" class="text-center">No tags yet..</th>
</tr>
@endif
</tbody>
</table>
</div>
</div>


@endsection