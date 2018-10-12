@extends('layouts.app')

@section('title','新着ランキング')

@section('content')

    <h1>新着ランキング</h1>
    @if ($posts)
      <div class="row">
        @foreach ($posts as $key => $post)
          <p>{{ $key+1 }}位 {{ date("m/d H:i",strtotime($post->updated_at))}}</p>
          {{ Helper::convert_to_fuzzy_time($post->updated_at) }}
          <p>スレッドタイトル</p>
        @endforeach
      </div>
    @endif
@endsection