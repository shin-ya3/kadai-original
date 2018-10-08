@extends('layouts.app')

@section('title','投稿一覧')

@section('content')

    <h2>{{ $thread->title }}</h2>
    
    @if (count($posts) > 0)
        <ul>
            @foreach ($posts as $post)
                <li>
                  <span class="post_no">{{ $post->id }}</span>
                  <span class="post_name">名前：{{ $post->name }}</span>
                  <span class="post_id">ID:</span>
                  <span class="edit_link">[編集]</span>
                </li>
            @endforeach
        </ul>
    @endif
   
   <h3>コメントを投稿</h3>
    
    
@endsection