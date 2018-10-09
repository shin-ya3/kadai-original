@extends('layouts.app')

@section('title','新規スレッド作成')

@section('content')


    <h1>スレッド新規作成</h1>
    
   
          
            {!! Form::model($thread, ['route' => ['thread.store',$board->id], 'method' =>'post']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('post_comment', 'コメント') !!}
                    {!! Form::text('post_comment', null, ['class' => 'form-control']) !!}
                </div>
                
                <div style="text-align:center;">
                {!! Form::submit('スレッドを作成する', ['class' => 'btn btn-primary btn-lg']) !!}
                </div>
                
            {!! Form::close() !!}
           
            {{-- 
            <form action="{{ url('/board/{id}/thread',$board->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" class="form-control"  placeholder="">
                </div>
                
                <div class="form-group">
                <label for="name">名前</label>
                <input type="text" name="name" class="form-control"  placeholder="">
                </div>
                
                <div style="text-align:center;">
                <button type="submit" class="btn btn-primary btn-lg">スレッドを作成する</button>
                </div>
            
            </form>
             --}}
    
    
@endsection