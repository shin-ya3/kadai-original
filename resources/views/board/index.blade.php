@extends('layouts.app')

@section('title','掲示板')

@section('content')

    <h2>掲示板一覧</h2>

    @if (count($boards) > 0)
        <ul>
            @foreach ($boards as $board)
                <li><a href="{{ route('thread.index', $board->id) }}">{{ $board->name }}</li>
            @endforeach
        </ul>
    @endif
   
    {!! link_to_route('board.create', '新規掲示板の作成') !!}
@endsection