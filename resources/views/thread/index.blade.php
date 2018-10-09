@extends('layouts.app')

@section('title', $board->name)

@section('content')

    <h2>{{ $board->name }}</h2>
    
    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>タイトル</th>
    			<th>作成者・更新日</th>
    		</tr>
    	</thead>
    	<tbody>
    	 @if (count($threads) > 0) 
    	   @foreach ($threads as $thread)
      		<tr>
      			<td><a href="{{ route('post.index', $thread->id) }}">{{ $thread->title }}</td>
      			<td>{{ $thread->name }} {{ $thread->updated_at}}</td>
      		</tr>
      	 @endforeach
      	 
      	@endif
    	</tbody>
    </table>
    
   {!! link_to_route('thread.create', '新規スレッドの作成',['board'=>$board]) !!}

@endsection