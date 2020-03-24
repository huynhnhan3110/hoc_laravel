@extends('article.layouts.master')
@section('title', 'chi tiet bai viet')

@section('page_content')
    <h1>{{ $article->title }}</h1>
    
    <i>chuyen muc: </i>
    @foreach($article->categories as $category)
    <i>{{$category->content}}</i>
    @endforeach
    <hr>
    <div>{{ $article->content }}</div>
    <hr>
    @foreach($article->comments as $comment)
        <div>{{ $comment->content }}</div>
    @endforeach
@endsection