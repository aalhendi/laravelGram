@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/440px-Laravel.svg.png"
                style="width: 150px; height:150px;" class="rounded-circle" />
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex pb-3">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>20.2k</strong> followers</div>
                <div class="pr-5"><strong>200</strong> following</div>
            </div>
            <div class="font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div>
                <a href="#">{{$user->profile->url}}</a>
            </div>
        </div>
        <div class="row pt-5">
            @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="{{$post->image}}" class="w-100" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endsection