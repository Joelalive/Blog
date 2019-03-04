@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">Users</div>
<div class="card-body">
<table class="table table-hover">
<thead>
<th>Image</th>
<th>Name</th>
<th>Permission</th>
<th>Delete</th>
</thead>
<tbody>
@if(!$users->isEmpty())
@foreach($users as $user)
<tr>
<td><img class="rounded" src="{{$user->profile->avatar}}" alt="{{$user->title}}" width="50px" height="35px"></td>
<td>{{$user->name}}</td>
<td>
@if($user->admin)
<a href="{{ route('user.not.admin', ['user' => $user->id ]) }}" class="btn btn-sm btn-danger">Remove Permission</a>
@else
<a href="{{ route('user.admin', ['user' => $user->id ]) }}" class="btn btn-sm btn-success">Make Admin</a>
@endif
</td>
<td>
@if(Auth::id() !== $user->id)
<a href="{{ route('user.delete', ['user' => $user->id ]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
@endif
</td>
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