@extends('layouts.app')

@section('content')
<div class="container">
    @forelse ($profiles as $profile)
    <div class="row offset-5">
        <div class="py-4 d-flex align-items-center">
            <a href="/profile/{{$profile->user->id}}">
                <img src="{{$profile->image ? $profile->image : "/storage/profile/empty-profile.jpg"}}" alt=""
                    class="rounded-circle mr-5" style="max-width:100px" />
            </a>
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{$profile->user->id}}">
                        <span class="h3 text-dark">{{$profile->user->username}}</span>
                    </a>
                </span>
                <br />
                <a href="/profile/{{$profile->user->id}}">
                    <span class="h5 text-dark">{{$profile->title}}</span>
                </a>
            </p>
        </div>
    </div>

    @empty
    <div class="row justify-content-center">
        <h3 class="text-center">
            No results found for
            <br />
            <strong>{{request()->query('search')}}</strong>
            <br />
            :(
        </h3>
    </div>
    @endforelse

    <div class="row d-flex align-items-center justify-content-center">
        <div class="pagination">
            {{$profiles->appends(['search' =>request()->query('search')])->links()}}
        </div>
    </div>

</div>
@endsection