@extends('article.layouts.master')
@section('title', 'chi tiet bai viet')

@section('page_content')
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <hr>
    @foreach($article->comments as $comment)
        <div>{{ $comment->content }}</div>
    @endforeach
@endsection