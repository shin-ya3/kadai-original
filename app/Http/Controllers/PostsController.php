<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Thread;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($thread_id)
    {
        $thread = Thread::find($thread_id);
        
        $posts = Post::where('thread_id', $thread_id)->get();
        
       
        
        return view('post.index', [
        'thread' =>$thread,
        'posts' =>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($thread_id)
    {
        $thread = Thread::find($thread_id);
        $post = new Post;
        return view('post.create', [
            'thread' => $thread,
            'post' => $post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($thread_id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'post' => 'required',
        ]);
        
        
        $post = new Post;
        $post->name = $request->name;
        $post->post = $request->post;
        $post->thread_id = $thread_id;
        
        $post->visitor = $request->ip();

        $post->save();
       
        return redirect()->route('post.index',[$thread_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
