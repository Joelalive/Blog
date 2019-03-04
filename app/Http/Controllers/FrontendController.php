<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontendController extends Controller
{
    public function index(){
        $title = Setting::first()->site_name;
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $laravel = Category::find(1);
        $angular = Category::find(2);
        $vue = Category::find(5);
        $settings = Setting::first();

        return view('index',compact('title','categories','first_post','second_post','third_post',
                    'laravel','angular','vue','settings'));
    }

    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();
        $title = Setting::first()->site_name;
        $categories = Category::take(5)->get();
        $settings = Setting::first();

        $next_id = Post::where('id', '>' ,$post->id)->min('id');
        $prev_id = Post::where('id', '<' ,$post->id)->max('id');

        $next = Post::find($next_id);
        $prev = Post::find($prev_id);

        return view('single',compact('post','title','categories','settings','next','prev'));
    }
}
