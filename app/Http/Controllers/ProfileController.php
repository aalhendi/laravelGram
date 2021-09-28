<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // If not using User model from \App\Models\User,
        // Then user must be retrieved as such:
        // $user = User::findOrFail($user);

        $isFollowing = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followerCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );

        return view('profiles/show', compact('user', 'isFollowing', 'postCount', 'followerCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'url' => 'url | nullable',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = '/storage/' . request('image')->store('profile', 'public');

            $image = Image::make(public_path($imagePath))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Include auth() before user to only accept data from the current authenticated user
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('profile/' . $user->id);
    }
}
