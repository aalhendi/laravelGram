@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-3 p-5">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/440px-Laravel.svg.png" style="width: 150px; height:150px;" class="rounded-circle" />
      </div>
      <div class="col-9 pt-5">
        <div><h1>LaravelGram</h1></div>
        <div class="d-flex pb-3"> 
            <div class="pr-5"><strong>100</strong> posts</div>
            <div class="pr-5"><strong>20.2k</strong> followers</div>
            <div class="pr-5"><strong>200</strong> following</div>
        </div>
        <div class="font-weight-bold">Laravel Gram</div>
        <div>Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.</div>
        <div>
            <a href="#">https://laravel.com/</a>
      </div>
  </div>
  <div class="row pt-5">
      <div class="col-4">
          <img src="https://media.istockphoto.com/photos/vegan-homemade-chocolate-chunk-cookies-on-cooling-rack-flat-lay-picture-id1294238220?s=612x612" class="w-100" />
      </div>
      <div class="col-4">
          <img src="https://media.istockphoto.com/photos/homemade-chocolate-chip-cookies-stacked-tower-isolated-on-white-picture-id157308370?s=612x612" class="w-100" />
      </div>
      <div class="col-4">
          <img src="https://media.istockphoto.com/photos/chocolate-chip-cookies-on-white-picture-id174478330?s=612x612" class="w-100" />
      </div>
  </div>
</div>
@endsection
