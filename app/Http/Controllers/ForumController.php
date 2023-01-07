<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\KategoryForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Splade;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Splade::onLazy(fn () => Forum::query()->with('kategoryForum', 'user')->where('user_id', Auth::user()->id)->latest()->paginate());
        $forums_count = Forum::get()->count();
        return view('forum.index', compact('forums', 'forums_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoryForum::get();
        return view('forum.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
            'categories' => 'required',
        ]);

        Forum::create([
            'title' => $request->title,
            'body' => $request->body,
            'kategory_forum_id' => $request->categories,
            'user_id' => Auth::user()->id,
        ]);

        Splade::toast('Your forum has been created!')->autoDismiss(5);

        return redirect()->route('panel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        $categories = KategoryForum::get();

        return view('forum.edit', compact('categories', 'forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'body' => 'required',
            'kategoryForum' => 'required',
        ]);

        $forum->update([
            'title' => $request->title,
            'body' => $request->body,
            'kategory_forum_id' => $request->kategoryForum,

        ]);

        Splade::toast('Your forum has been updated!')->autoDismiss(5);

        return redirect()->route('panel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $data = $forum->delete($forum->id);

        Splade::toast('Your forum has been deleted!')->autoDismiss(5);

        return redirect()->route('panel.index');
    }
}
