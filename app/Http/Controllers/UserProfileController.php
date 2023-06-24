<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Post;
use App\Models\User;
use App\Models\Album;
use App\Helper\Helper;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBiodataRequest;
use App\Http\Requests\UpdateBiodataRequest;

class UserProfileController extends Controller
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
    public function store(StoreBiodataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $params =  [
            'title' => 'Profile',
            'user' => $user,
            'posts' => Post::latest()
                ->where('user_id', $user->id)
                ->paginate(10)
                ->withQueryString(),
            'biodata' => Biodata::latest()->where('user_id', $user->id)
                ->get()[0],
            'arts' => Art::latest()
                ->where('user_id', $user->id)
                ->paginate(10)
                ->withQueryString(),
            'helper' => Helper::class
        ];

        if ($user->id != auth()->user()->id) {
            $params['albums'] = Album::latest()
                ->where('user_id', $user->id)
                ->where('privacy', 'public')
                ->paginate(10)
                ->withQueryString();
        } else {
            $params['albums'] = Album::latest()
                ->where('user_id', $user->id)
                ->paginate(10)
                ->withQueryString();
        }

        return view('profile.index', $params);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biodata $biodata)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'born' => 'required',
            'hobby' => 'required|max:255',
            'country' => '',
            'gender' => '',
            'descriptions' => ''
        ]);

        Biodata::where('id', $biodata->id)->update($validatedData);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        //
    }
}
