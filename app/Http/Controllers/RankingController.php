<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class RankingController extends Controller
{
    public function new()
    {
      $posts = \DB::table('posts')->latest()->take(10)->get();
      
      return view('ranking.new',['posts' =>$posts,]);
    }
    
    public function popular()
    {
      
    }
}
