@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <div class="d-flex align-items-center">
                <a href="/profile/{{$post->user->profile->id}}">
                    <img class="rounded-circle w-20 mb-2 mr-2" style="max-width:30px" src="{{$post->user->profile->image}}" alt="" />
                    <span class="h6 text-dark font-weight-bold">{{$post->user->username}}</span>
                </a>
            </div>
            <a href="/p/{{$post->id}}">
                <img src="{{$post->image}}" alt="" class="w-100" />
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <like-button user-id="{{auth()->user()->id}}" />
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

    @empty
    <div class="row  justify-content-center">
        <h3 class="text-center">
            No posts to show :(
            <br />
            Follow some users to start seeing posts!
        </h3>
    </div>
    @endforelse

    <div class="row d-flex align-items-center justify-content-center">
        <div class="pagination">{{$posts->links()}}</div>
    </div>

</div>
@endsection