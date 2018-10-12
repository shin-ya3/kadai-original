<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Thread;
use App\Post;
use Hash;

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
        
        return view('post.index', ['thread' =>$thread,'posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($thread_id)
    {
       /* $thread = Thread::find($thread_id);
        $post = new Post;
        return view('post.create', [
            'thread' => $thread,
            'post' => $post,
        ]);*/
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
            'name' => 'max:191',
            'comment' => 'required',
            'password'=> 'min:4|max:10',
        ]);
        
        
        $post = new Post;
        
        if (isset($request->name)) {
            $post->name = $request->name;
        } else {
            $post->name = '名無し';
            
        }
        $post->comment = $request->comment;
        $post->thread_id = $thread_id;
        $post->password = bcrypt($request->password);
        $post->inner_id = Post::where('thread_id', $thread_id)->count() + 1;
        $post->ip = $request->ip();
        
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
    public function edit($thread_id,$post_id)
    {
        $thread = Thread::find($thread_id);
        $post = Post::where('thread_id', $thread_id)->where('id', $post_id)->first();
        
        return view('post.edit',
        ['thread'=>$thread,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $thread_id, $post_id)
    {
        $this->validate($request, [
            'comment' => 'required',
            'password'=> 'min:4|max:10',
        ]);
        
        if (isset($request->edit)) {
            $post = Post::find($post_id);
            
            if(!Hash::check($request->password, $post->password)) {
                return redirect()->back()->withErrors(['passwordが違います'])->withInput();
            }
            
            $post->comment = $request->comment;
    
            $post->ip = $request->ip();
            $post->save();
    
            return redirect()->route('post.index',[$thread_id,$post_id]);
        } elseif (isset($request->delete)) {
            $post = Post::find($post_id);
            
            if(!Hash::check($request->password, $post->password)) {
                return redirect()->back()->withErrors(['passwordが違います'])->withInput();
            }
            
            $post->delete();
    
            return redirect()->route('post.index',[$thread_id,$post_id]);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread_id,$post_id)
    {
        $post = Post::find($post_id);
        
        if(!Hash::check($request->password, $post->password)) {
            return redirect()->back()->withErrors(['passwordが違います'])->withInput();
        }
        
        $post->delete();

        return redirect()->route('post.index',[$thread_id,$post_id]);
        
    }
    
}
