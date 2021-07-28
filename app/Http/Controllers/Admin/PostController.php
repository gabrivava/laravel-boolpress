<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.posts.index', compact('posts', 'categories'));
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
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'author' => 'required | max:255 | min: 5',
            'paragraph' => 'required', 
            'category_id' => 'nullable | exists:categories,id', // verifica che la colonna id all'interno della tabella categories cheeffettivamente esiste
            'tags' => 'nullable | exist:tags,id',
            'image' => 'nullable | mimes:jpeg,png,jpg,gif,svg | max: 500 ',
            'paragraph' => 'required',
            'date' => 'required'
        ]);
        $image = Storage::disk('images')->put('posts_img', $request->image);
        $validatedData['image'] = $image;

        
        // dd($image);
        $post = Post::create($validatedData);
        $post->tags()->attach($request->tags);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        // dd($categories[$post->category_id]);
        return view('admin.posts.show', compact('post', 'categories'));
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
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $validatedData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'author' => 'required | max:255 | min: 5',
            'paragraph' => 'required', // poteva essere nullable se impostato cosi in migration.
            'category_id' => 'nullable | exists:categories,id',
            'image' => 'nullable | mimes:jpeg,png,jpg,gif,svg | max:255 ',
            'paragraph' => 'required',
            'date' => 'required'
        ]);
        $post->update($validatedData);
        return redirect()->route('admin.posts.index');
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
        return redirect()->route('admin.posts.index');
    }
}
