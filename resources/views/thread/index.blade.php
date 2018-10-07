@extends('layouts.app')


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
      			<td>{{ $thread->title }}</td>
      			<td>{{ $thread->name }}{{ $thread->updated_at}}</td>
      		</tr>
      	 @endforeach
      	 {!! $threads->render() !!}
      	@endif
    	</tbody>
    </table>
   {!! link_to_route('thread.create', '新規スレッドの作成') !!}
@endsection