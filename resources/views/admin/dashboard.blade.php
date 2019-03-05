@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                <h6 class="text-center">Published Posts</h6>              
                </div>
                <div class="card-body">
                <h1 class="text-center">{{$post_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-danger text-white">
                <h6 class="text-center">Trashed Posts</h6>
                </div>
                <div class="card-body">
                <h1 class="text-center">{{$trashed_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                <h6 class="text-center">Users</h6>
                </div>
                <div class="card-body">
                <h1 class="text-center">{{$users_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning text-white">
                <h6 class="text-center">Categories</h6>
                </div>
                <div class="card-body">
                <h1 class="text-center">{{$categories_count}}</h1>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
