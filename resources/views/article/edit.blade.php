@extends('article.layouts.master')
@section('title','Chinh sua bai viet')
@section('page_content')
<h2>Chinh sua bai viet</h2>
<form action="{{ route('articleUpdate') }}" method="post">
    <!-- Neu khong co token cho route nhan thi no se bi loi 419 -->
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $article->id }}">
    <div class="form-group">
        <label for="title">Tieu de</label>
        <input type="text" class="form-control" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
        <label for="content">Noi dung</label>
        <textarea class="form-control" rows="5" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Hoan Thanh</button>
</form>
@endsection