<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');// pluck function is used to get a specific column from database

        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')){
            $ideas= $ideas->where('content', 'like', '%'.request()->get('search', ''. '%'));
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
