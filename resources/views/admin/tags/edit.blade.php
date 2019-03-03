@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Edit Tag : {{$tag->tag}}
</div>
<div class="card-body">
<form action="{{route('tag.update',['tag' => $tag->id])}}" method="post" >
@csrf
<div class="form-group">
<label for="tag">Tag Name</label>
<input type="text" name="tag" value="{{$tag->tag}}" id="" class="form-control">
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Update Tag</button>
    </div>
</div>
</form>
</div>
</div>


@endsection