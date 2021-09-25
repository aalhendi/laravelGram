<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // If not using User model from \App\Models\User,
        // Then user must be retrieved as such:
        // $user = User::findOrFail($user);

        return view('profiles/index', compact('user'));
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
