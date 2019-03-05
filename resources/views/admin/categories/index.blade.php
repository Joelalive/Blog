@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">Categories</div>
<div class="card-body">
<table class="table table-hover">
<thead>
<th>Category Name</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
@if(!$categories->isEmpty())
@foreach($categories as $category)
<tr>
<td>{{$category->name}}</td>
<td><a href="{{ route('category.edit',['category'=> $category->id]) }}" class="btn btn-sm btn-info">
<i class="fa fa-edit"></i>
</a></td>
<td><a href="{{route('category.delete',['category'=> $category->id])}}" class="btn btn-sm btn-danger">
<i class="fa fa-trash"></i>
</a></td>
<td></td>
</tr>
@endforeach
@else
<tr>
<th colspan="3" class="text-center">No Categories yet..</th>
</tr>
@endif
</tbody>
</table>
</div>
</div>


@endsection