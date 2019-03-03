@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Update Category : {{$category->name}}
</div>
<div class="card-body">
<form action="{{route('category.update',['category' => $category->id])}}" method="post" >
@csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="" value="{{$category->name}}" class="form-control">
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Update Category</button>
    </div>
</div>
</form>
</div>
</div>


@endsection