@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Create New Tag
</div>
<div class="card-body">
<form action="{{route('tag.store')}}" method="post" >
@csrf
<div class="form-group">
<label for="tag">Tag Name</label>
<input type="text" name="tag" id="" class="form-control">
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Store Tag</button>
    </div>
</div>
</form>
</div>
</div>


@endsection