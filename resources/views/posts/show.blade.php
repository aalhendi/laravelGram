@extends('layouts.app')

@section('content')
<div class="container">
    Show
    <div class="row">
        <div class="col-8">
            <img src="{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="">
                <h3>
                    {{$post->user->username}}
                </h3>
                <p>{{$post->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection