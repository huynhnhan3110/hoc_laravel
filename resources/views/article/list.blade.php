@extends('article.layouts.master')
@section('title', 'Danh sach bai viet')

@section('page_content')
<h1>Danh sach bai viet</h1>
<form action="{{ route('articleList') }}" method="get">
<input type="text" name="keyword" placeholder="tim kiem">

</form>

<div id="article_list">
    @foreach($articles as $article)
    <div>
        <h3><a href="{{ route('detail', ['id' => $article->id]) }}">{{ $article->title }}</a></h3>
        <a href="{{ route('articleEdit',['id' => $article->id]) }}">Sua</a>
        <a href="{{ route('articleDelete',['id' => $article->id]) }}">Xoa</a>

    </div>
    @endforeach
    <div>
        {{ $articles->links() }}
    </div>
</div>
@endsection