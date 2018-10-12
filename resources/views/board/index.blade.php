@extends('layouts.app')

@section('title','掲示板')

@section('content')

    <div class="text-center"><h1>おためし掲示板</h1></div>
    <br>
    <div class="container-fluid">
        <div class="row">
		    <div class="col-xs-12 col-md-6"><div class="rank1">人気スレッド</div></div>
		    <div class="col-xs-12 col-md-6"><a href="{{ route('ranking.new') }}"><div class="rank2">新着スレッド</div></a></div>
		 </div>
	</div>
    <br>
    <div class="b-navi">
    <h2>掲示板一覧</h2>
   
    @if (count($boards) > 0)
         <ul>
                
            @foreach ($boards as $board)
                <li><a href="{{ route('thread.index', $board->id) }}"><div class="board-list">｜{{ $board->name }}</div></a></li>
            @endforeach
          </ul>  
    @endif
    
   </div>
    {!! link_to_route('board.create', '新規掲示板の作成') !!}
@endsection

