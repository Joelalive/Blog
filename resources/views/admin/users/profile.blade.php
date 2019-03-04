@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Edit Your Profile
</div>
<div class="card-body">
<form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" value="{{$user->email}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="password">New Password</label>
<input type="password" name="password" id="" class="form-control">
</div>
<div class="form-group">
<img class="rounded border border-info" src="{{$user->profile->avatar}}" alt="{{$user->name}}" width="100px" height="80px">
</div>
<div class="form-group">
<label for="avatar">Upload New Avatar</label>
<input type="file" name="avatar" id="" class="form-control">
</div>
<div class="form-group">
<label for="facebook">Facebook Profile</label>
<input type="text" name="facebook" value="{{$user->profile->facebook}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="youtube">Youtube Profile</label>
<input type="text" name="youtube" value="{{$user->profile->youtube}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="about">About</label>
<textarea name="" id="" cols="5"  rows="5" class="form-control">{{$user->profile->about}}</textarea>
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Update User</button>
    </div>
</div>
</form>
</div>
</div>


@endsection