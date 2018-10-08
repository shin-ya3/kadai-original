<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Board;
use App\Thread;

class ThreadsController extends Controller
{
    public function index($id)
    {
        $board = Board::find($id);
        
        $threads = Thread::where('board_id', $id)->get();
        
        return view('thread.index', [
        'board' =>$board,
        'threads' =>$threads]);
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
