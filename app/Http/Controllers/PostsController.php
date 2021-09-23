<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // Protect the route from unauthenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            //'extra' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        // Concat / prepend storage before image path that comes from request
        $imagePath = '/storage/' . request('image')->store('uploads', 'public'); // s3: Amazon S3 - Cloud Object Storage

        // TODO: Crop square for selection before resizing
        $image = Image::make(public_path($imagePath))->fit(1200, 1200);
        $image->save();

        // user_id is set because we go through the authenticated user via the relationship to create a post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
        //return view('posts/create');
    }
}
