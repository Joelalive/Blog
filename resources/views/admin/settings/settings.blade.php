@extends('layouts.app')

@section('content')

@include('errors')

<div class="card card-default">
<div class="card-header">
Edit blog settins</div>
<div class="card-body">
<form action="{{route('settings.update')}}" method="post" >
@csrf
<div class="form-group">
<label for="site_name">Name</label>
<input type="text" name="site_name" value="{{$settings->site_name}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="contact_number">Contact number</label>
<input type="text" name="contact_number" value="{{$settings->contact_number}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="contact_email">Email</label>
<input type="text" name="contact_email" value="{{$settings->contact_email}}" id="" class="form-control">
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" name="address" value="{{$settings->address}}" id="" class="form-control">
</div>
<div class="form-group">
    <div class="text-center">
    <button type="submit" class="btn btn-success">Update Settings</button>
    </div>
</div>
</form>
</div>
</div>


@endsection