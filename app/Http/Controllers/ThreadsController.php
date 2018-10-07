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
    
    public function store(Request $request)
    {
      $this->validate($request, [
            'title' => 'required|max:191',
            'name' => 'required|max:191'
            ]);

        $request->user()->microposts()->create([
            'title' => $request->title,
            'name' => $request->name
        ]);

        return redirect()->back();
    }
    
    
    public function create($id)
    {
        $board = Board::find($id);
        return view('thread.create', ['board' => $board]);
    }

}
