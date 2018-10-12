@extends('layouts.app')

@section('title',$thread->title)

@section('content')

    <h2>{{ $thread->title }}</h2>
    <br>
    <a href="{{ route('thread.index',$thread->board_id,$thread->id) }}">スレッド一覧へ戻る</a>
    <br/>
    <br/>
    @if (count($posts) > 0)
        <div class="post_list"> 
       
        <ul>
            @foreach ($posts as $post)
                <li id="post{{ $post->inner_id }}">
                  <span class="post_no">{{ $post->inner_id }}</span>
                  <span class="post_name">{{ $post->name }}</span>
                  <span class="post_day">投稿日：{{ date("Y/m/d H:i",strtotime($post->created_at))}}</span>
                  <span class="post_id">ID:{{ ip2long($post->ip) }}</span>
                  <span class="edit_link"><a href="{{ route('post.edit',[$thread->id, $post->id]) }}">[編集]</a></span><br>
                  <p>{!! Helper::comment_display($post->comment) !!}</p>
                </li>
            @endforeach
        </ul>
        </div>
    @endif
   
<!--   {!! link_to_route('post.create', 'コメントする',['thread'=>$thread]) !!}-->
   <br>
  <h3>コメントを書き込む</h3>
  <br>
  <div class="post_area">
   {!! Form::model(null, ['route' => ['post.store',$thread->id], 'method' =>'post']) !!}
          <div class="form-group">
              {!! Form::label('name', '名前') !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('comment', 'コメント') !!}
              {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('password', 'パスワード') !!}
              {!! Form::password('password',['class' => 'form-control']) !!}
          </div>
          <div style="text-align:center;">
              {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-lg']) !!}
          </div>
                    
    {!! Form::close() !!}
    </div>
@endsection