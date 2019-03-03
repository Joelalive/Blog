@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Create New Category
</div>
<div class="card-body">
<form action="{{route('category.store')}}" method="post" >
@csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="" class="form-control">
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Store Category</button>
    </div>
</div>
</form>
</div>
</div>


@endsection