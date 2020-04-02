@extends('article.layouts.master')
@section('title', 'Danh sach bai viet')

@section('page_content')
<h1>Danh sach bai viet</h1>
<form action="{{ route('articleList') }}" method="get">
<input type="text" name="keyword" placeholder="tim kiem">

</form>

<div id="article_list">
    
<article-list></article-list>
</div>
@endsection