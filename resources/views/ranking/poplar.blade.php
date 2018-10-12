@extends('layouts.app')

@section('title','人気ランキング')

@section('content')

    <h1>人気ランキング</h1>
    @if ($threads)
      <div class="row">
        @foreach ($threads as $key => $thread)
          <p>{{ $key+1 }}位</p>
          <p>{{ date("m/d H:i",strtotime($thread->updated_at))}}</p>
          <p>{{$therad->name}}</p>
        @endforeach
      </div>
    @endif
@endsection