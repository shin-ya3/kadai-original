@extends('layouts.app')

@section('content')


    <h1>スレッド新規作成</h1>
    
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($thread, ['route' => 'thread.store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::model($post, ['route' => 'post.store']) !!}
                <div class="form-group">
                    {!! Form::label('post', 'コメント') !!}
                    {!! Form::text('post', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::close() !!}
                {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            
        </div>
    </div>
    
@endsection