<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{

//    Before loading any of the method, we need the authentication except for index and show
    public function _construct()
    {

        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

//        $request->user()->authorizeRoles(['employee', 'manager']);
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index', ['post' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //we have to validate before we insert
        $this->validate($request, ['title' => 'required|min:3', 'contents' => 'required|min:10']);

//        echo 'Thaka';

        Post::create([
            'title' => $request->title,
            'contents' => $request->contents,
        ]);

        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

        $post->title = $request->title;
        $post->contents = $request->contents;
        $post->save();
        session()->flash('message', 'Your post has been updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
