<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $search = request()->query('q');

        // If theres a search query, handle that, else show posts/index
        if ($search) {
            $users = User::where('username', 'LIKE', "%{$search}%")->pluck('id');
            $profiles = Profile::whereIn('user_id', $users)->with('user')->simplePaginate(20);
            return view('profiles/index', compact('profiles'));
        }
    }
}
