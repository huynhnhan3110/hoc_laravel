<h1>Tao bai viet</h1>
<form action="{{ route('createArticle') }}" method="post">
    <!-- Neu khong co token cho route nhan thi no se bi loi 419 -->
    {{ csrf_field() }}
    <div>
        <label>Tieu de</label>
        <input type="text" name="title">
    </div>
    <div>
        <label>Noi dung</label>
        <textarea name="content"></textarea>
    </div>
    <div>
        <button type="submit">Dang bai</button>
    </div>
</form>