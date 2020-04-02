@extends('article.layouts.master')
@section('title','Tao bai viet')
@section('page_content')
<h1>Tao bai viet</h1>
<form action="{{ route('createArticle') }}" method="post">
    <!-- Neu khong co token cho route nhan thi no se bi loi 419 -->
    {{ csrf_field() }}
    <div class="form-group has-error">
        <label for="title">Tieu de</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" name="title" value="{{ old('title') }}">
        @error('title')
            {{ $message }}
            <p>Bố đặt lại tiêu đề hộ cái</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Noi dung</label>
        <textarea class="form-control @error('title') is-invalid @enderror" rows="5" name="content">
        {{ old('content') }}
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Dang Bai</button>
</form>
@endsection