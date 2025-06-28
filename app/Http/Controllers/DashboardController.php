<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        

        $comments = Comment::with([
            'post:id,title', // Only select specific columns from post
            'user:id,name'   // Only select specific columns from user
        ])->where('user_id', $user->id)->where('post_id', 4)->get();
        $data['comments'] = $comments;

        return Inertia::render('Dashboard', $data);
    }
}
