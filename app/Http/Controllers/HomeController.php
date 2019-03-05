<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_count = Post::all()->count();
        $trashed_count = Post::onlyTrashed()->get()->count();
        $users_count = User::all()->count();
        $categories_count = Category::all()->count();
        return view('admin.dashboard', compact('post_count','trashed_count',
                    'users_count','categories_count'));
    }
}
