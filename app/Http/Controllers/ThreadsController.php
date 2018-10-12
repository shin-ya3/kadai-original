<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Board;
use App\Thread;
use App\Post;

class ThreadsController extends Controller
{
    public function index($id)
    {
        $board = Board::find($id);
        
        $threads = Thread::withCount('posts')->where('board_id', $id)->latest()->paginate(5);
        
        return view('thread.index', [
        'board' =>$board,
        'threads' =>$threads
        ]);
    }
    
    public function store($id, Request $request)
    {
      $this->validate($request, [
            'title' => 'required|max:191',
            'name' => 'required|max:191'
            ]);

        $thread = new Thread;
        $thread->title = $request->title;
        $thread->name = $request->name;
        $thread->board_id = $id;
        $thread->save();
        
        // PostControllerから貼り付け
        $post = new Post;
        
        if (isset($request->name)) {
            $post->name = $request->name;
        } else {
            $post->name = '名無し';
        }

        $post->comment = $request->post_comment;
        $post->thread_id = $thread->id;
        $post->password = bcrypt('$request->password');
        $post->inner_id = 1;
        $post->ip = $request->ip();
        $post->save();
       
        return redirect()->route('thread.index',[$id]);
    }
    
    
    public function create($id)
    {
        $board = Board::find($id);
        $thread = new Thread;
        return view('thread.create', [
            'board' => $board,
            'thread' => $thread,
        ]);
    }

}
