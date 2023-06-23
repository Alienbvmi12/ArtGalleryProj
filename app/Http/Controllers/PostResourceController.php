<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.posts', [
            'title' => 'All Post',
            'active' => 'blogposts',
            'posts' => Post::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:254',
            'album_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['slug'] = Helper::generateSlug($validatedData['title']);
        $validatedData['excerpt'] = Helper::generateExcerpt($validatedData['body'], 50);
        
        $imgPath = $request->file('cover_image')->store('post-covers');

        $validatedData['cover_image'] = $imgPath;
        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
