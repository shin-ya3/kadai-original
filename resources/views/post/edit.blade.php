@extends('layouts.app')

@section('title','コメントの編集')

@section('content')

  <h1>コメントの編集</h1>
  
      {!! Form::model($post, ['route' => ['post.update',$thread->id, $post->id], 'method' =>'put']) !!}
          <div class="form-group">
              {!! Form::label('name', '名前') !!}
              {!! Form::text('name', old($post->name), ['class' => 'form-control','readonly' => 'readonly']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('comment', 'コメント') !!}
              {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('InputPassword', 'パスワード') !!}
              {!! Form::password('password', ['class' => 'form-control']) !!}
          </div>
          <div style="text-align:center;">
              {!! Form::submit('編集する', ['name' => 'edit', 'class' => 'btn btn-primary btn-lg']) !!}
              {!! Form::submit('削除する', ['name' => 'delete', 'class' => 'btn btn-danger btn-lg']) !!}
          </div>
                    
      {!! Form::close() !!}
      
@endsection