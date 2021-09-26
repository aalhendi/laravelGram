@extends('layouts.app')

@section('content')
<div class="container">

    @if ($posts['items'])
    @foreach ($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/p/{{$post->user->profile->id}}">
                <img src="{{$post->image}}" alt="" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>
                </span>
                {{$post->caption}}
            </p>
        </div>
    </div>
    @endforeach
    @else
    <div class="row  justify-content-center">
        <h3>
            No posts to show :(
            <br>
            Follow some users to start seeing posts!
        </h3>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <col-12>{{$posts->links()}}</col-12>
</div>

</div>
@endif
@endsection