@extends('article.layouts.master')
@section('title','Chinh sua bai viet')
@section('page_content')
<h2>Chinh sua bai viet</h2>
<form action="{{ route('articleUpdate') }}" method="post">
    <!-- Neu khong co token cho route nhan thi no se bi loi 419 -->
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $article->id }}">
    <div>
        <label>Tieu de</label>
        <input type="text" name="title" value="{{ $article->title }}">
    </div>
    <div>
        <label>Noi dung</label>
        <textarea name="content" >{{ $article->content }}</textarea>
    </div>
    <div>
        <button type="submit">Hoan thanh</button>
    </div>
</form>
@endsection