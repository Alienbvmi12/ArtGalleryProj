<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'descriptions' => 'required',
            'type' => 'required'
        ]);

        $validatedData['slug'] = Helper::generateSlug($validatedData['title']);

        $imgPath = $request->file('content')->store('art-contents');

        $validatedData['content_url'] = $imgPath;
        $validatedData['user_id'] = auth()->user()->id;

        Art::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Art $art)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Art $art)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Art $art)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        //
    }
}
