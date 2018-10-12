@extends('layouts.app')

@section('title', $board->name)

@section('content')

    <h2>{{ $board->name }}</h2>
    <br>
    <a href="{{ route('board.index') }}">掲示板一覧へ戻る</a>
    <br>
    <br>
    <table class="table table-striped table-bordered">
        <div class="row">
    	<thead>
    		<tr>
    			<th class="col-xs-12 col-md-8">タイトル</th>
    			<th class="col-xs-12 col-md-4">作成者・更新日</th>
    		</tr>
    	</thead>
    	<tbody>
    	 @if (count($threads) > 0) 
    	   @foreach ($threads as $thread)
      		<tr>
      			<td class="col-xs-12 col-md-8"><a href="{{ route('post.index', $thread->id) }}">{{ $thread->title }}<span class="count_badge">コメント数{{$thread->posts_count}}</span></td>
      			<td class="col-xs-12 col-md-4"> <span class="post_name">{{ $thread->name }}</span>  {{ date("m/d H:i",strtotime($thread->updated_at))}}</td>
      		</tr>
      	 @endforeach
      	 
      	@endif
      	</div>
      	
    	</tbody>
    </table>
    <div style="text-align:center;">
      	   {!! $threads->render() !!}  
      	</div>
   {!! link_to_route('thread.create', '新規スレッドの作成',['board'=>$board]) !!}

@endsection