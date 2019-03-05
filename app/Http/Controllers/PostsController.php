<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->isEmpty())
        {
            session()->flash('warning','You need to create a category first!');
            return back();
        }

        if($tags->isEmpty())
        {
            session()->flash('warning','You need to create a Tags first!');
            return back();
        }

        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id'  => 'required',
            'tags'  => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts' , $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);
        
        session()->flash('success', 'Post created successfully!');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'content'  => 'required',
            'category_id'  => 'required'
        ]);

        if($request->hasFile('featured')){

            $featured = $request->featured;
            
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts' , $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;

        $post->content = $request->content;

        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        session()->flash('success', 'Post Updated successfully!');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success', 'Your post has been trashed');

        return redirect()->route('posts');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed',compact('posts'));
    }

    public function kill($id){

        $post = Post::withTrashed()->where('id' , $id);

        $post->forceDelete();

        session()->flash('success', 'Your post has been Deleted Permanently');

        return back();

    }

    public function restore($id){

        $post = Post::withTrashed()->where('id' , $id);

        $post->restore();

        session()->flash('success', 'Your post has been restored Successfully !');

        return redirect()->route('posts');

    }
}
