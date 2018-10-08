@extends('layouts.app')

@section('title','新規掲示板作成')

@section('content')


    <h1>掲示板新規作成</h1>
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($board, ['route' => 'board.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', '掲示板名 ') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            
        </div>
    </div>
    
@endsection