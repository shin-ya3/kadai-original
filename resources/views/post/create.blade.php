@extends('layouts.app')

@section('title','投稿一覧')

@section('content')

    {!! Form::model($post, ['route' => ['post.store',$thread->id], 'method' =>'post']) !!}
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
              {!! Form::text('password', null, ['class' => 'form-control']) !!}
          </div>
          <div style="text-align:center;">
              {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-lg']) !!}
          </div>
                    
    {!! Form::close() !!}

@endsection