@extends('layouts.app')

@section('title',$thread->title)

@section('content')

    <h2>{{ $thread->title }}</h2>
    
    @if (count($posts) > 0)
        <ul class="post_list">
            @foreach ($posts as $post)
                <li>
                  <span class="post_no">{{ $post->inner_id }}</span>
                  <span class="post_name">{{ $post->name }}</span>
                  <span class="post_day">投稿日：{{ $post->created_at }}</span>
                  <span class="post_id">ID:{{ $post->ip }}</span>
                  <span class="edit_link"><a href="{{ route('post.edit',[$thread->id, $post->id]) }}">[編集]</a></span><br>
                  <p>{!! nl2br(e($post->comment)) !!}</p>
                </li>
            @endforeach
        </ul>
    @endif
   
   {!! link_to_route('post.create', 'コメントする',['thread'=>$thread]) !!}
    
    
@endsection