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

    public function index()
    {
        $usersFollowing = auth()->user()->following()->pluck('profiles.user_id');
        $posts = \App\Models\Post::whereIn('user_id', $usersFollowing)->with('user')->latest()->paginate(5);

        return view('posts/index', compact('posts'));
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
    }

    // If route param has same name in the controller and the route in web.php,
    // then we can use type hints to do the Route Model binding.
    public function show(\App\Models\Post $post)
    {
        // compact('post') === ['post' => $post]
        return view('posts/show', compact('post'));
    }
}
