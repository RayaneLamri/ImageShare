<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreShareRequest;
use App\Http\Requests\UpdateShareRequest;
use Auth;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shares.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShareRequest $request)
    {
        Share::create([
            'image' => $request->file('image')->hashName(),
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => Auth::user()->id
        ]);
        $request->file('image')->store('public');
        return redirect('/shares');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        return view('shares.show', ['share' => $share]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        return view('shares.edit', ['share' => $share]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests  $request
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShareRequest $request, Share $share)
    {
        Storage::delete($share['image']);
        $share->update([
            'image' => $request['image'],
            'titre' => $request['titre'],
            'description' => $request['description'],
            'user_id' => $request['user_id']
        ]);

        $request->file('image')->store('public');
        return redirect('/shares');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        Storage::delete($share->image);
        $share->delete();
        return redirect('/shares');
    }

    public function profile(Share $share)
    {
        $shares = Auth::user()->shares()->get();
        return view('shares.profile', ['shares' => $shares]);
    }

    public function userprof(Share $share, User $user)
    {
        $user = $share->user;
        $shares = Share::where('user_id', $share->user_id)->get();
        return view('shares.profile', ['shares' => $shares, 'user' => $user]);
    }

    public function welcome()
    {
        return view('dashboard',  ['shares' => Share::all()]);
    }
}
